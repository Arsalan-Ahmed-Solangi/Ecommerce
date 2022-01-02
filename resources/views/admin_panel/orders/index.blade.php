@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-shopping-cart"></i> Orders</h5>

            </div>

            <div class="card-body">
                <table class="table table-responsive table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>SR#</th>
                            <th>Order No</th>
                            <th>Customer Name</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) > 0)
                            @foreach ($orders as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <th>{{ $value->order_no }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->order_amount }}</td>
                                <td>{{ $value->order_status }}</td>
                                <td>

                                    <a href="{{ route('orders.show',$value->order_id) }}" class="text-primary"><i class="fa fa-eye fa-2x"></i> </a>
                                    <form method="POST" action="{{route('orders.destroy', $value->order_id) }}"  >
                                        @method('DELETE')
                                        @csrf

                                        <button  type="submit" class="btn btn-danger" style="color:#fff"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" align="center"><b>No Orders Found</b></td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
