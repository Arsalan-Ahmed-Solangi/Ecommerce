<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Models\Admin\Order;
use Auth;
use Redirect;
use Illuminate\Support\Str;
use App\Models\Cart;
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

        return view('home',compact('categories'));
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
        $categories = Category::latest()->get();
        return view('cart',compact('categories'));
    }
}
