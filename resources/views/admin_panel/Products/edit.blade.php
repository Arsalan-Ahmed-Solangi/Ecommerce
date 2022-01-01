@extends('admin_panel/layouts/default')

@section('content')

<style>
    .imgPreview img {
          padding: 8px;
          max-width: 100px;
      } 
   </style>
    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-edit"></i> Edit Product</h5>
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
            
              {!! Form::model($products,array('route' => ['products.update',$products->product_id ],'method'=>'PUT','id'=>'form')) !!}
              <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4">
                     <div class="form-group">
                        <strong>Category <span class="text-danger">*</span></strong>
                       <select  id="category" class="form-control" name='category' required>
                            <option value="">Choose Category</option> 
                              @if (isset($categories) && !empty($categories))
                               @foreach ($categories as $category)
                                {{$selected = ''}}
                                @if (isset($products->category_id) && $category->category_id == $products->category_id)
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
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4">
                     <div class="form-group">
                        <strong>Product Name <span class="text-danger">*</span></strong>
                        {!! Form::text('productName',$products->product_name, array('placeholder' => 'Enter Product Name','class' => 'form-control','required')) !!}
                    </div>
                </div> 
            </div>
                <div class="row">   
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Product No <span class="text-danger">*</span></strong>
                            {!! Form::number('productno',$products->product_no, array('placeholder' => 'Enter Product No','class' => 'form-control','required')) !!}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Product Price <span class="text-danger">*</span></strong>
                            {!! Form::number('productPrice',$products->product_price, array('placeholder' => 'Enter Product Price','class' => 'form-control','required')) !!}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Product Selling Price <span class="text-danger">*</span></strong>
                            {!! Form::number('productSellingPrice',$products->product_selling_price, array('placeholder' => 'Enter Product Selling Price','class' => 'form-control','required')) !!}
                        </div>
                    </div> 
                </div>
                <div class="row">  
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Product Stock <span class="text-danger">*</span></strong>
                            {!! Form::number('productStock',$products->product_stock, array('placeholder' => 'Enter Product Stock','class' => 'form-control','required')) !!}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Product Weight <span class="text-danger">*</span></strong>
                            {!! Form::text('productWeight',$products->product_weight, array('placeholder' => 'Enter Product Weight','class' => 'form-control','required')) !!}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Is Feature <span class="text-danger">*</span></strong><br>
                        
                            {!! Form::select('isFeature',config('global.isFeature'),$products->is_feature, array('class' => 'form-control','required','placeholder'=>'--Choose  Feature Option--')) !!}

                        </div>
                    </div> 
                </div>
                <div class="row">    
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Status <span class="text-danger">*</span></strong>
                            {!! Form::select('status',config('global.status'),$products->status, array('class' => 'form-control','required','placeholder'=>'--SELECT STATUS--')) !!}
                        </div>
                    </div>
                   <?php 
                    $colorArray = isset($products->product_colors)?explode(',',$products->product_colors):'';
                   ?>
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Colors <span class="text-danger">*</span></strong>
                            {{-- {!! Form::select('colors[]',config('global.colors'), $products->product_colors, array('id'=>'choices-multiple-remove-button','class' => 'form-control','required','multiple','placehole'=>'Choose color options' )) !!} --}}
                          <select  id="category" class="form-control" name='colors[]' multiple>
                            <option value="">Choose color options</option>
                            @foreach (config('global.colors') as $key=> $colors)
                            {{$selected =''}}
                             @foreach ($colorArray as $clr => $color)
                                 @if ($key == $color )
                                     {{$selected ='selected'}}
                                 @endif
                             @endforeach
                            <option value="{{$key}}"  {{$selected}}> 
                                {{$colors}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="form-group">
                            <strong>Product Description <span class="text-danger">*</span></strong>
                            {!! Form::textarea('description',$products->product_description, array('placeholder' => 'Enter  Discription','rows' => 4,'class' => 'form-control','required')) !!}
                        </div>
                     </div>
                </div>
                <div class="row">
                    <div class="user-image mb-3 text-center">
                        @foreach ($products_images as $images)  
                        <div class="imgPreview">
                            <img src="{{public_path().'uploads/'.$images->product_image}}" alt=""> 
                        </div>
                        @endforeach
                    </div>            
        
                    <div class="custom-file">
                        <input type="file" name="imageFile[]" accept=".jpg,.jpeg,.png" class="custom-file-input" id="images" multiple="multiple">
                        <label class="custom-file-label" for="images">Update image</label>
                    </div>
                </div>

              {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
var SubCategory  = <?=json_encode($SubCategory);?>; 
var products  = <?=json_encode($products);?>; 


var SubCategoryOptions = '';    
      
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

             // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        }); 
        SubCategory.forEach(function(option) 
        { 
            selected='';
            if(products.sub_category_id &&  option.sub_category_id == products.sub_category_id )
            {
                selected = 'selected';
            }
            SubCategoryOptions += '<option value="' + option.sub_category_id + '" '+selected+'>' + option.title + '</option>';
         }); 
          $("#subCategory").append(SubCategoryOptions);
     }); 
     
    
</script>
