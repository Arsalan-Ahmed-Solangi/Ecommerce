@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-edit"></i> Edit Category</h5>
                <hr/>
            </div>

            <div class="card-body" style="padding:0px 0px 0px 10px">
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

                 {!! Form::model($category,array('route' => ['categories.update',$category->category_id ],'method'=>'PUT','id'=>'form')) !!}


                        <div class="form-group">
                            <strong>Category Name <span class="text-danger">*</span></strong>
                            {!! Form::text('title', null, array('placeholder' => 'Enter Category Name','class' => 'form-control','name'=>'title')) !!}

                        </div>

                        <div class="form-group">
                            <strong>Category Description <span class="text-danger">*</span></strong>
                            {!! Form::textarea('description', null, array('placeholder' => 'Enter Category Description','class' => 'form-control no-resize','rows'=>'4','name'=>'description')) !!}
                        </div>


                        <div class="form-group">
                            <strong>Status <span class="text-danger">*</span></strong>
                            {!! Form::select('status',config('global.status'), null, array('class' => 'form-control','placeholder'=>'--SELECT STATUS--')) !!}
                        </div>

                        <br/>
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-7 col-sm-7"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <button type="submit" class="btn btn-primary btn-xs" style="color:#fff;padding:5px 10px 5px 10px">Submit</button>
                            </div>
                        </div>
                        <br/>

                 {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
