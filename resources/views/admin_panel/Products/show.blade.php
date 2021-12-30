@extends('admin_panel/layouts/default')

@section('content')
  
    
    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-info-circle"></i> Category Details</h5>
                <hr/>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong>Category</strong>
                        <p>{{ $data['category'][0]->category_title ?? null  }}</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong>Sub Category</strong>
                        <p>{{ $data['category'][0]->sub_categorie ?? null  }}</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong> Product Name</strong>
                        <p>{{  $data['products'][0]->product_name ?? null  }}</p>

                    </div>
                </div>
                <br/>
                <br/>
                <div class="row"> 
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong> Product No </strong>
                        <p>{{ $data['products'][0]->product_no ?? null  }}</p>

                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong> Product Price</strong>
                        <p>{{ $data['products'][0]->product_price ?? null  }}</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong> Product Selling Price</strong>
                        <p>{{ $data['products'][0]->product_selling_price ?? null  }}</p>
                    </div>
                </div>
                <br/> 
                 <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong>Product Stock</strong> 
                       <p>{{ $data['products'][0]->product_stock ?? null  }}</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong>Product Weight</strong> 
                       <p>{{ $data['products'][0]->product_weight ?? null  }}</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <strong>Is Feature</strong> 
                        <p>{{ $data['products'][0]->is_feature ?? null  }}</p>
                    </div>
                </div>
                <br/> 
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-xs-1">
                        <strong>Status</strong>

                        @if ($data['products'][0]->status == 1)
                            <p><span class="badge" style="background:#22D69D">Active</span></p>
                        @else
                        <p><span class="badge" style="background:#FB8678">Inactive</span></p>
                        @endif
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-3"></div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <strong>Colors</strong>
                        <p>{{ $data['products'][0]->product_colors ?? null  }}</p> 
                    </div>
                </div>
                <br/>
            </div>
        </div>
    </div>


@endsection
