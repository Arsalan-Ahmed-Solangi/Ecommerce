@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-tasks"></i> Categories</h5>

            </div>

            <div class="card-body">
                <table class="table table-responsive table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>SR#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories) > 0)
                            @foreach ($categories as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <th>{{ $value->title }}</th>
                                <td>{{ $value->description }}</td>
                                <td>
                                    @if ($value->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                       <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="text-primary"><i class="fa fa-eye fa-2x"></i> </a>
                                    <a href="" class="text-success"><i class="fa fa-edit fa-2x"></i> </a>
                                    <a href="" class="text-danger"><i class="fa fa-trash fa-2x"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="5">No Categories Found</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
