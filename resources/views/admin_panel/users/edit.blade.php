@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-edit"></i> Edit User</h5>
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

                 {!! Form::model($user,array('route' => ['users.update',$user->id ],'method'=>'PUT','id'=>'form')) !!}


                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <strong>Name <span class="text-danger">*</span></strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Enter Name','class' => 'form-control','name'=>'name')) !!}

                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <strong>Email <span class="text-danger">*</span></strong>
                                    {!! Form::email('email', null, array('placeholder' => 'Enter Email Address','class' => 'form-control','name'=>'email')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <strong>Password <span class="text-danger">*</span></strong>
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','name'=>'password')) !!}

                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <strong>Gender <span class="text-danger">*</span></strong>
                                    {!! Form::select('gender',config('global.gender'), null, array('class' => 'form-control','placeholder'=>'--SELECT GENDER--')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <strong>Phone No <span class="text-danger">*</span></strong>
                                    {!! Form::text('phone_no', null, array('placeholder' => 'Enter Phone No','class' => 'form-control','name'=>'phone_no')) !!}


                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <strong>Date of Birth <span class="text-danger">*</span></strong>
                                    {!!  Form::date('dob',null,array('class'=>'form-control','name'=>'dob')) !!}
                                </div>
                            </div>
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
