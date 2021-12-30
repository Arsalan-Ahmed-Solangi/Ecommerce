@extends('admin_panel/layouts/default')

@section('content')

    
    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-product-hunt"></i> Add Product</h5>
                <hr/> 
            </div>

            <div class="card-body">
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
              <?php  
                        $products = $data['products'];
                        // print_r($products);
                       $categories = $data['categories']; 
                       $subCategory = $data['subCategories'];
                       // echo $products['0']->product_id;
                       // die;
                     ?>

                <form  action="{{ route('products.update',['id' => $products['0']->product_id])}}" method="POST" id="form">
                 {!! Form::model($products,array('route' => ['products.update',$products['0']->product_id ],'method'=>'PUT','id'=>'form')) !!}
                    
                    @csrf
                        <input type="hidden" name="hiddenId" value='{{isset($products[0]->product_id)?$products[0]->product_id:""}}'>
                         <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Category <span class="text-danger">*</span></strong>
                                       <select  id="category" class="form-control" name='category' required>
                                            <option value="">Choose Category</option> 
                                              @if (isset($categories) && !empty($categories))
                                               @foreach ($categories as $category)
                                                   @define $selected = '';
                                                   @if(isset($products[0]->category_id) && $products[0]->category_id == $category->category_id)
                                                      {{$selected ='selected'}}
                                                   @endif
                                                <option value="{{$category->category_id}}" {{$selected}}>
                                                    {{$category->title}}
                                                </option>
                                                @endforeach
                                              @endif
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Sub Category<span class="text-danger">*</span></strong>
                                        <select  id="subCategory" class="form-control" name='subCategory'>
                                            <option value="">Choose Sub Category</option> 
                                            @if($products[0]->sub_category_id)
                                                @foreach($subCategory as $value)
                                                   @define $selected = '';
                                                   @if(isset($products[0]->sub_category_id) && $products[0]->sub_category_id == $value->sub_category_id)
                                                      {{$selected ='selected'}}
                                                   @endif
                                                <option value="{{$value->sub_category_id}}" {{$selected}}>
                                                    {{$value->title}}
                                                </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Name <span class="text-danger">*</span></strong>
                                        {!! Form::text('productName',$products[0]->product_name ?? null, array('placeholder' => 'Enter Product Name','class' => 'form-control','required')) !!}
                                    </div>
                                </div> 
                        </div>
                        <div class="row">
                                
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product No <span class="text-danger">*</span></strong>
                                        {!! Form::number('productno', $products[0]->product_no ?? null, array('placeholder' => 'Enter Product No','class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Price <span class="text-danger">*</span></strong>
                                        {!! Form::number('productPrice', $products[0]->product_price ?? null, array('placeholder' => 'Enter Product Price','class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                  <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Selling Price <span class="text-danger">*</span></strong>
                                        {!! Form::number('productSellingPrice', $products[0]->product_selling_price ?? null, array('placeholder' => 'Enter Product Selling Price','class' => 'form-control','required')) !!}
                                    </div>
                                </div> 
                        </div>
                        <div class="row">
                              
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Stock <span class="text-danger">*</span></strong>
                                        {!! Form::number('productStock', $products[0]->product_stock ?? null, array('placeholder' => 'Enter Product Stock','class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Weight <span class="text-danger">*</span></strong>
                                        {!! Form::text('productWeight', $products[0]->product_weight ?? null, array('placeholder' => 'Enter Product Weight','class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Is Feature <span class="text-danger">*</span></strong>
                                        {{-- {!! Form::text('isFeature', $products[0]->is_feature ?? null, array('placeholder' => 'Enter Feature','class' => 'form-control','required')) !!} --}}
                                        {!! Form::select('isFeature',config('global.isFeature'),  $products[0]->is_feature, array('class' => 'form-control','required','placeholder'=>'--Choose  Feature Option--')) !!}

                                    </div>
                                </div> 
                        </div>
                        <div class="row">
                               
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <strong>Status <span class="text-danger">*</span></strong>
                                        {!! Form::select('status',config('global.status'), $products[0]->status ?? selected, array('class' => 'form-control','required','placeholder'=>'--SELECT STATUS--')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-6 col-lg-6 col-sm-6">
                                  <div class="form-group">
                                    <strong>Product Description <span class="text-danger">*</span></strong>
                                    {!! Form::textarea('description', $products[0]->product_description ?? null, array('placeholder' => 'Enter  Discription','rows' => 4,'class' => 'form-control','required')) !!}
                                 </div>
                             </div>
                        </div>
                   

                    
                    <br/>
                    <div class="row" style='float: right;'> 
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            <button type="submit" class="btn btn-primary btn-xs" style="color:#fff;float-right">Submit</button>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    {!! Form::close() !!}
            </div>
        </div>
    </div> 

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
      $(document).ready(function () {
            $('#category').on('change', function () {
                var categoryId = this.value;
               
             
                $.ajax({
                    url: "{{url('subcategory')}}",
                    type: "POST",
                    data: {
                        categoryId: categoryId,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#subCategory").html('');
                        $('#subCategory').html('<option value="">Choose Sub Category</option>');
                        $.each(result, function (key, value) {
                            $("#subCategory").append('<option value="' + value
                                .sub_category_id + '">' + value.title + '</option>');
                        });
                       
                    }
                });
            });
     });
</script>