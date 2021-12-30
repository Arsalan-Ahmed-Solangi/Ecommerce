<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use Illuminate\Http\Request;

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

    /****************************************************/
    /*                  Start Show Categories           */
    /****************************************************/

    
    /****************************************************/
    /*                    End Show Categories           */
    /****************************************************/

}
