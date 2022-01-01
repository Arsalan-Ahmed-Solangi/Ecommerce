<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Shipping;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shipping = Shipping::latest()->get();

        return view('admin_panel.shipping.index',compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.shipping.create');
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
            'shipping_title'    => 'required|min:5|max:50',
            'shipping_price'    => 'required',
            'status'            => 'required'
        ]);


        Shipping::create([

            'shipping_id'     => Str::uuid(),
            'shipping_title'  => $request->shipping_title ?? null,
            'shipping_price'     => $request->shipping_price ?? null,
            'status'  => $request->status  ?? null,
        ]);

        return redirect()->route('shipping.index')
        ->with('success','Shipping created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($shipping_id)
    {
        $category = Shipping::firstOrFail()->where('shipping_id', $shipping_id);
        $category->delete($shipping_id);
        return redirect()->route('shipping.index')
        ->with('success','Shipping deleted successfully!');

    }
}
