@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >


            <div class="card-body">

               <table class="table table-responsive table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="4"><center><i class="fa fa-info-circle"></i> ORDER DETAILS</center></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><b>Order No : </b>{{ $orders[0]->order_no ?? null  }}</p>
                            </td>
                            <td colspan="2">
                                <p><b>Customer Name : </b>{{$orders[0]->name ?? null  }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><b>Phone No : </b>{{ $orders[0]->phone_no ?? null  }}</p>
                            </td>
                            <td colspan="2">
                                <p><b>Email : </b>{{$orders[0]->email ?? null  }}</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <p><b>Postal Code : </b>{{$orders[0]->postal_code ?? null  }}</p>
                            </td>
                            <td colspan="2">
                                <p><b>Address : </b>{{$orders[0]->address ?? null  }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4"><center>ORDER SUMMARY</center></th>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <th>Cost</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as  $key => $value)
                        <tr>
                            <td>{{ $value->product_name  }}</td>
                            <td>{{ "$".$value->product_selling_price  }}</td>
                            <td>{{ $value->quantity  }}</td>
                            <td>{{ "$".$value->product_selling_price  }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <center><b>Order Status </b>{{ $orders[0]->order_status ?? null   }}</center>
                            </td>

                            <td><center><b>Total Amount :  </b>{{ $orders[0]->order_amount ?? null  }}</center></td>
                        </tr>
                    </tfoot>
               </table>
               @if (count($errors) > 0)
                    <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                 @endif
               {!! Form::model($orders[0],array('route' => ['orders.update',$orders[0]->order_id ],'method'=>'PUT','id'=>'form')) !!}

               <div class="form-group">
                <strong>Status <span class="text-danger">*</span></strong>
                {!! Form::select('order_status',config('global.order_status'), null, array('class' => 'form-control','placeholder'=>'--SELECT STATUS--')) !!}
                </div>

                <br/>
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-7 col-sm-7"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <button type="submit" class="btn btn-primary btn-xs" style="color:#fff;padding:5px 10px 5px 10px">Update Status</button>
                    </div>
                </div>
                <br/>

               {!! Form::close() !!}
               <hr/>
            </div>
        </div>
    </div>


@endsection
