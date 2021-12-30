<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //**start of getting all categories******//
        $categories = Category::latest()->get();

        //**end of getting all categories*******//
        return view('admin_panel.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.categories.create');
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
            'title'       => 'required|min:5|max:50',
            'description' => 'required|min:5|max:500',
            'status'      => 'required'
        ]);

        Category::create([

            'category_id'   => Str::uuid(),
            'title'         => $request->title ?? null,
            'description'   => $request->description ?? null,
            'status'        => $request->status  ?? null,
        ]);

        return redirect()->route('categories.index')
        ->with('success','Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $category = Category::latest()->where('category_id','=',$id)->get();
        return view('admin_panel.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin_panel.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {

        $request->validate([
            'title'       => 'required|min:5|max:50',
            'description' => 'required|min:5|max:500',
            'status'      => 'required'
        ]);

        $category->update([

            'title'         => $request->title ?? null,
            'description'   => $request->description ?? null,
            'status'        => $request->status  ?? null,

        ]);

        return redirect()->route('categories.index')
        ->with('success','Category updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category = Category::firstOrFail()->where('category_id', $category_id);
        $category->delete($category_id);
        return redirect()->route('categories.index')
        ->with('success','Category deleted successfully!');

    }
}
