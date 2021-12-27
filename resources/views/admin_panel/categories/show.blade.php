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
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong>Category Title</strong>
                        <p>{{ $category[0]->title ?? null  }}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <strong>Category Desciption</strong>
                        <p>{{ $category[0]->description ?? null  }}</p>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-xs-1">
                        <strong> Status</strong>

                        @if ($category[0]->status == 1)
                            <p><span class="badge" style="background:#22D69D">Active</span></p>
                        @else
                        <p><span class="badge" style="background:#FB8678">Inactive</span></p>
                        @endif
                    </div>

                </div>
                <br/>
            </div>
        </div>
    </div>


@endsection
