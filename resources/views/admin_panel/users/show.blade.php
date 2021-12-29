@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-info-circle"></i> User Details</h5>
                <hr/>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong>Full Name</strong>
                        <p>{{ $users->name ?? null  }}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong>Email</strong>
                        <p>{{ $users->email ?? null  }}</p>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong>Phone No</strong>
                        <p>{{ $users->phone_no  ?? null }}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong>Gender</strong>
                        <p>{{ $users->gender ?? null }}</p>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong> Date of Birth</strong>
                        <p>{{ $users->dob ?? null }}</p>

                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong> Added On</strong>
                        <p>{{ $users->created_at ?? null }}</p>

                    </div>

                </div>

                <br/>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong> Updated On</strong>
                        <p>{{ $users->updated_at ?? null }}</p>

                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong> Status</strong>

                        @if ($users->status == 1)
                        <br/><br/><b class="bg-success" style="color:#fff; padding:5px">Active</b>
                        @else
                        <br/><br/><b  style="color:#fff; padding:5px;background:#FB8678">Inactive</b>

                        @endif
                    </div>

                </div>
                <br/>
            </div>
        </div>
    </div>


@endsection
