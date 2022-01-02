<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order;
use App\Models\OrderProduct;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::leftjoin('users','users.id','=','orders.user_id')->get();

        return view('admin_panel.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $orders = Order::join('users','users.id','=','orders.user_id')->where('order_id','=',$id)->get();
        $products  = DB::table('orders_product')
        ->join('products', 'products.product_id', '=', 'orders_product.product_id')
        ->where('orders_product.order_id', '=', $id)
        ->get();

        // print_r($orders);
        // die;

        return view('admin_panel.orders.show',compact('orders','products'));
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
    public function update(Request $request, Order $order)
    {

        $request->validate([
            'order_status' => 'required'
        ]);

        $order->update([

            'order_status' => $request->order_status  ?? null,

        ]);

        return redirect()->route('orders.index')
        ->with('success','Order status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {


        $order = Order::firstOrFail()->where('order_id', $order_id);
        $order->delete($order_id);
        return redirect()->route('orders.index')
        ->with('success','Order deleted successfully!');


    }
}
