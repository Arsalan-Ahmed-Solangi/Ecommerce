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
                <form action="{{ route('products.store')  }}" method="POST" id="form">
                    @csrf
                         <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Category <span class="text-danger">*</span></strong>
                                       <select  id="category" class="form-control" name='category' required>
                                            <option value="">Choose Category</option> 
                                              @if (isset($categories) && !empty($categories))
                                               @foreach ($categories as $category)
                                                <option value="{{$category->category_id}}">
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
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Name <span class="text-danger">*</span></strong>
                                        {!! Form::text('productName', null, array('placeholder' => 'Enter Product Name','class' => 'form-control','required')) !!}
                                    </div>
                                </div> 
                        </div>
                        <div class="row">
                                
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product No <span class="text-danger">*</span></strong>
                                        {!! Form::text('productno', null, array('placeholder' => 'Enter Product No','class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Price <span class="text-danger">*</span></strong>
                                        {!! Form::number('productPrice', null, array('placeholder' => 'Enter Product Price','class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                  <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Selling Price <span class="text-danger">*</span></strong>
                                        {!! Form::number('productSellingPrice', null, array('placeholder' => 'Enter Product Selling Price','class' => 'form-control','required')) !!}
                                    </div>
                                </div> 
                        </div>
                        <div class="row">
                              
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Stock <span class="text-danger">*</span></strong>
                                        {!! Form::text('productStock', null, array('placeholder' => 'Enter Product Stock','class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Product Weight <span class="text-danger">*</span></strong>
                                        {!! Form::text('productWeight', null, array('placeholder' => 'Enter Product Weight','class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-4">
                                     <div class="form-group">
                                        <strong>Is Feature <span class="text-danger">*</span></strong>
                                        {!! Form::text('isFeature', null, array('placeholder' => 'Enter Feature','class' => 'form-control','required')) !!}
                                    </div>
                                </div> 
                        </div>
                        <div class="row">
                               
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <strong>Status <span class="text-danger">*</span></strong>
                                        {!! Form::select('status',config('global.status'), null, array('class' => 'form-control','required','placeholder'=>'--SELECT STATUS--')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-6 col-lg-6 col-sm-6">
                                  <div class="form-group">
                                    <strong>Product Description <span class="text-danger">*</span></strong>
                                    {!! Form::textarea('description', null, array('placeholder' => 'Enter  Discription','rows' => 4,'class' => 'form-control','required')) !!}
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
                </form>
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