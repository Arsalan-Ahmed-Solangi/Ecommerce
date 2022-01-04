<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;

use Illuminate\Http\Request;
use App\Models\Admin\Order;
use Auth;
use Redirect;
use DB;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\OrderProduct;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $categories = Category::latest()->get();
         $subcategories= subcategory::latest()->get();
        return view('home',compact('categories','subcategories'));
    }

    public function changePassword(){

        // return view('home');
    }

    public function viewOrders(){

        $orders = Order::join('users','users.id','=','orders.user_id')->where('id','=',Auth::user()->id)->get();
        $categories = Category::latest()->get();
        return view('viewOrders',compact('orders','categories'));

    }

    public function logout(Request $request) {
        DB::table('cart')->delete();
        Auth::logout();
        return redirect()->route('home')
        ->with('success','Logout  successfully!');
    }


    public function addToCart(Request $request){


        if(!Auth::check()){
            return redirect()->route('login')
          ->with('error','You have to login first!');
        }else{

            $request->validate([


                'product_id' => 'required',
                'color'      => 'required',
                'quantity'   => 'required',

            ]);


            Cart::create([

                'cart_id' =>  Str::uuid(),
                'product_id' => $request->product_id ?? null,
                'color'      => $request->color,
                'quantity'   => $request->quantity,

            ]);

            return Redirect::back()->with('success', 'Product added in cart');

        }

    }

    public function viewCart(){

        $cart = Cart::join('products','products.product_id','=','cart.product_id')->get();




        $categories = Category::latest()->get();
        return view('cart',compact('categories','cart'));
    }

    public function deleteCart(Request $request){
        $id = $request->cart_id;
        $cart = Cart::findorfail($id);
        $cart->delete();
        return Redirect::back()->with('success', 'Product removed from cart');

    }

    public function updateCart(Request $request){

        $id = $request->cart_id;
        $cart = Cart::findorfail($id);
        $cart->update([

            'quantity'         => $request->quantity ?? null,

        ]);
        return Redirect::back()->with('success', 'Cart updated successfully!');

    }


    public function checkOut(){

        $cart = Cart::join('products','products.product_id','=','cart.product_id')->get();

        $categories = Category::latest()->get();
        return view('checkout',compact('categories','cart'));

    }

    public function checkOutProcess(Request $request)
    {


        $request->validate([


            'address' => 'required',
            'postal_code'      => 'required',


        ]);
        $order  = new Order();
        $order->order_id = Str::uuid();
        $order->user_id = Auth::user()->id;
        $order->order_no = "O12A2".time();
        $order->address = $request->address;
        $order->postal_code = $request->postal_code;
        $order->order_amount = $request->total_amount;
        $order->save();

       $id = $order->order_id;
       $cart = Cart::join('products','products.product_id','=','cart.product_id')->get();

       foreach($cart as $key => $value)
       {
            OrderProduct::create([

                'order_product_id' =>Str::uuid(),
                'order_id' => $id,
                'product_id' => $value->product_id,
                'cost' => $value->product_selling_price,
                'quantity' => $value->quantity,

            ]);
       }

       DB::table('cart')->delete();
       return redirect()->route('home')
       ->with('success','Your order has beed created!');
    }

 public function showProductBySubCategoryId($id)
    {
        $categories = Category::latest()->get(); 
        $product= Product::latest()->get();
        $subcategories= subcategory::latest()->get();

         $products = Product::join('product_images', 'products.product_id', '=', 'product_images.product_id')
        ->join('sub_categories', 'sub_categories.sub_category_id', '=', 'products.sub_category_id')  
        ->where('products.sub_category_id',$id)
        ->get(['products.*', 'product_images.*','sub_categories.*']);
         return view('index',compact('categories','products','subcategories'));
    }
}
