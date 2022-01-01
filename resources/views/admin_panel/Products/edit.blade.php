@extends('admin_panel/layouts/default')

@section('content')


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
