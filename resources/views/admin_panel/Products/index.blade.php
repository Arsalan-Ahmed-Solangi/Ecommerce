@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-product-hunt"></i> Product</h5>
            </div>
            <div class='col-lg-12'>
                <a href="{{ route('products.create')  }}" class='btn btn-success'><i class="fa fa-product-hunt"></i>  <span> Add Product </span>   </a>
                   <!--  <a class='btn btn-success'>Add Product</a> -->
            </div>
           <div class="col-lg-12" style="overflow-x: scroll;">  
            <div class="card-body">
                <table class="table table-responsive table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>SR#</th>
                              <th>Product Name</th>
                            <th>Product No</th>
                         
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Product Selling Price</th>
                            <!-- <th>Product Stock</th> -->
                            <!-- <th>Product Weight</th> -->
                            <!-- <th>Product Stock</th>   -->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                           @if (count($products) > 0)
                            @foreach ($products as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <th>{{ $value->product_name }}</th>
                                <td>{{ $value->product_no }}</td>
                                <td>{{ $value->product_description }}</td>
                                <td>{{ $value->product_price }}</td>
                                <td>{{ $value->product_selling_price }}</td>
                                <td>{{ $value->product_selling_price }}</td>  
                                <td>
                                    @if ($value->status == 1)
                                        <span class="badge" style="background:#22D69D">Active</span>
                                    @else
                                       <span class="badge" style="background:#FB8678">Inactive</span>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ route('products.show',$value->product_id) }}" class="text-primary"><i class="fa fa-eye fa-2x"></i> </a>
                                    <a href="{{ route('products.edit',$value->product_id) }}" class="text-success"><i class="fa fa-edit fa-2x"></i> </a>
                                    <form method="POST" action="{{route('products.destroy', $value->product_id) }}"  >
                                        @method('DELETE')
                                        @csrf

                                        <button  type="submit" class="btn btn-danger" style="color:#fff"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" align="center"><b>No Product Found</b></td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>


@endsection
