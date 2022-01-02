<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $categories = Category::latest()->get(); 
        $product= Product::latest()->get();
      
        $products= Product::join('product_images', 'products.product_id', '=', 'product_images.product_id')
        ->join('sub_categories', 'sub_categories.sub_category_id', '=', 'products.sub_category_id')  
        ->get(['products.*', 'product_images.*','sub_categories.*']);
         return view('index',compact('categories','products'));
    }
    public function singleProducShow($id='')
    {
       
         $categories = Category::latest()->get(); 
       
        // $products= Product::join('product_images', 'products.product_id', '=', 'product_images.product_id')
        // ->join('sub_categories', 'sub_categories.sub_category_id', '=', 'products.sub_category_id')  
        // ->where('products.product_id',$id) 
        // ->get(['products.*', 'product_images.*','sub_categories.*']); 
        $products = Product::latest()->where('product_id','=',$id)->get(); 
        $category = Category::latest()->where('category_id','=',  $products[0]->category_id)->get(); 
        $subcategory = SubCategory::latest()->where('category_id','=',  $category[0]->category_id)->get(); 
        $productImage = ProductImage::latest()->where('product_id','=',  $products[0]->product_id)->get();  
        return view('/products/single_products',compact('categories','products','category','subcategory','productImage'));
    }
}
