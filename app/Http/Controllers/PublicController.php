<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::latest()->get();
        return view('index',compact('categories','sub_categories'));
    }
}
