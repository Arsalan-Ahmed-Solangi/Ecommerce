<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Admin\{Product, Category, ProductImage, SubCategory};
use Carbon\Carbon;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin_panel.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $categories = Category::latest()->get();
        return view('admin_panel.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
       $request->validate([
            'category'              => 'required',
            'subCategory'           => 'required',
            'productno'            => 'required',
            'productPrice'          => 'required',
            'productName'           => 'required|min:5|max:50',
            'description'           => 'required|min:5|max:500',
            'productSellingPrice'   => 'required',
            'productStock'          => 'required',
            'productWeight'         => 'required',
            'isFeature'             => 'required',
            'status'                => 'required',  
        ]);
         $current_date_time = Carbon::now()->toDateTimeString();
 
        $colors = implode(",",$request->colors);

       $response= Product::create([ 
            'product_id'            => Str::uuid(),
            'category_id'           => $request->category,
            'sub_category_id'       => $request->subCategory ?? null,
            'product_no'            => $request->productno ?? null,
            'product_name'          => $request->productName  ?? null,
            'product_description'   => $request->description  ?? null,
            'product_price'         => $request->productPrice  ?? null,
            'product_selling_price' => $request->productSellingPrice  ?? null,
            'product_stock'         => $request->productStock  ?? null,
            'product_weight'        => $request->productWeight  ?? null,
            'is_feature'            => $request->isFeature  ?? null,
            'status'                => $request->status  ?? null,
            'product_colors'        => $colors ?? null,
            'created_at'            => $current_date_time,   
        ]);
    
        $product_id = implode('',explode(" ",$response->product_id)) ; 
       
        if(isset($product_id) && !empty($product_id))
        {
           
            $request->validate([
                'imageFile' => ' required', 
              ]); 
             foreach ($request->file('imageFile') as $file) {
                $name = $file->getClientOriginalName();
                $productImage = new ProductImage;
                $file->move(public_path().'/uploads/', $name);
                $productImage->product_image_id = Str::uuid();
                $productImage->product_image = $name;
                $productImage->product_id = $product_id;
                $productImage->save();
             } 
        }
      
        return redirect()->route('products.index')
        ->with('success','Product created successfully!');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $products = Product::latest()->where('product_id','=',$id)->get();
         $data['products'] = $products;
         $category_id     = isset($products[0]->category_id)?:'';
         $sub_category_id = isset($products[0]->sub_category_id)?$products[0]->sub_category_id:'';
 
           $data['category'] = Category::join('sub_categories', 'categories.category_id', '=', 'sub_categories.category_id')
               ->get(['categories.title as category_title', 'sub_categories.title as sub_categorie']);
                
        return view('admin_panel.products.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
      
        //    $data['products'] = Product::latest()->where('product_id','=',$id)->get();
            $data['categories'] = Category::latest()->get();
            $data['subCategories'] = SubCategory::latest()->get();

           return view('admin_panel.products.edit',compact('data')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'category'              => 'required',
            'subCategory'           => 'required',
            'productno'             => 'required',
            'productPrice'          => 'required',
            'productName'           => 'required|min:5|max:50',
            'description'           => 'required|min:5|max:500',
            'productSellingPrice'   => 'required',
            'productStock'          => 'required',
            'productWeight'         => 'required',
            'isFeature'             => 'required',
            'status'                => 'required',  
        ]);
         $update_date_time = Carbon::now()->toDateTimeString();
            $id = $request->id;
          
            $products                        = Product::find($id);
            $products->category_id           = $request->category;
            $products->sub_category_id       = $request->subCategory ?? null;
            $products->product_no            = $request->productno ?? null;
            $products->product_name          = $request->productName  ?? null;
            $products->product_description   = $request->description  ?? null;
            $products->product_price         = $request->productPrice  ?? null;
            $products->product_selling_price = $request->productSellingPrice  ?? null;
            $products->product_stock         = $request->productStock  ?? null;
            $products->product_weight        = $request->productWeight  ?? null;
            $products->is_feature            = $request->isFeature  ?? null;
            $products->status                = $request->status  ?? null;
            $products->updated_at             = $update_date_time;
            $products->save();

        return redirect()->route('products.index')
        ->with('success','Category created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
