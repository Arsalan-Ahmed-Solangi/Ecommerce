@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        @if (session('error'))
        <div style="background-color: #a81010; color: #fff; font-family: scandia-web,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji!important; text-align: center; padding: 12px; border: 1px solid #00FFFF; border-radius: 6px;">
            {{ session('error') }}
        </div>
       @endif

        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-key"></i> Change your  Password</h5>
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
                <form action="{{ route('resetProcess')  }}" method="POST" id="form">
                    @csrf

                    <div class="form-group">
                        <strong>Old Password <span class="text-danger">*</span></strong>
                        {!! Form::password('old_password', array('placeholder' => 'Enter your old password','class' => 'form-control','required')) !!}
                    </div>

                    <div class="form-group">
                        <strong>New Password <span class="text-danger">*</span></strong>
                        {!! Form::password('new_password', array('placeholder' => 'Enter new password','class' => 'form-control','required')) !!}
                    </div>

                    <div class="form-group">
                        <strong>Confirm Password <span class="text-danger">*</span></strong>
                        {!! Form::password('confirm_password', array('placeholder' => 'Confirm your password','class' => 'form-control','required')) !!}
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
                </form>
            </div>
        </div>
    </div>


@endsection
