<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Models\Admin\Order;
use Auth;
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
    /****************************************************/
    /*                  Start Show Categories           */
    /****************************************************/


    /****************************************************/
    /*                    End Show Categories           */
    /****************************************************/

}
