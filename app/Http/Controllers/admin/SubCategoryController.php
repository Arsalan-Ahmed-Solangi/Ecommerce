<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //**start of getting all subcategories******//
         $subcategories = SubCategory::leftJoin('categories', 'sub_categories.category_id', '=', 'categories.category_id')
         ->select('sub_categories.sub_category_id','sub_categories.status','categories.title as category_title','sub_categories.title')->get();
         //**end of getting all subcategories*******//


        return view('admin_panel.sub_categories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','category_id')->toArray();
        return view('admin_panel.sub_categories.create',compact('categories'));
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
            'title'       => 'required|min:3|max:50|regex:/^[a-zA-Z ]+$/u',
            'category_id' => 'required',
            'status'      => 'required',
        ]);

        SubCategory::create([

            'sub_category_id'   => Str::uuid(),
            'category_id'       => $request->category_id ?? null,
            'title'             => $request->title ?? null,
            'status'            => $request->status  ?? null,
        ]);

        return redirect()->route('subcategories.index')
        ->with('success','Sub Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $subcategories = SubCategory::where('sub_category_id','=',$id)->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.category_id')
        ->select('sub_categories.status','categories.title as category_title','sub_categories.title','sub_categories.created_at','sub_categories.updated_at')->first();

        return view('admin_panel.sub_categories.show',compact('subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = SubCategory::firstOrFail()->where('sub_category_id', $id);
        $category->delete($id);
        return redirect()->route('subcategories.index')
        ->with('success','Sub Category deleted successfully!');
    }
}
