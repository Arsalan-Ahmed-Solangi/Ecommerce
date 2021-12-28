@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-list-alt"></i> Sub Categories</h5>

            </div>

            <div class="card-body">
                <table class="table table-responsive table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>SR#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($subcategories))


                            @foreach ($subcategories as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <th>{{ $value->title }}</th>
                                <td>{{ $value->category_title }}</td>
                                <td>
                                    @if ($value->status == 1)
                                        <p><span class="badge" style="background:#22D69D">Active</span></p>
                                    @else
                                       <span class="badge" style="background:#FB8678">Inactive</span>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ route('subcategories.show',$value->sub_category_id) }}" class="text-primary"><i class="fa fa-eye fa-2x"></i> </a>
                                    <a href="{{ route('subcategories.edit',$value->sub_category_id) }}" class="text-success"><i class="fa fa-edit fa-2x"></i> </a>
                                    <form method="POST" action="{{route('subcategories.destroy', $value->sub_category_id) }}"  >
                                        @method('DELETE')
                                        @csrf

                                        <button  type="submit" class="btn text-danger" style="color:#fff"><i class="fa fa-trash text-danger fa-2x"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" align="center"><b>No Sub Categories Found</b></td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
