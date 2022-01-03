@extends('admin_panel/layouts/default')

@section('content')


    <div class="container-fluid" style="box-shadow: 1px 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card shadow-sm bg-white" >
            <div class="card-header">
                <h5><i class="fa fa-comments"></i> Product Reviews</h5>

            </div>

            <div class="card-body">
                <table class="table table-responsive table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>SR#</th>
                            <th>Product Name</th>
                            <th>Customer</th>
                            <th>Ratings</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($reviews) > 0)
                            @foreach ($reviews as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <th>{{ $value->product_name }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->rating }}</td>
                                <td>{{ $value->message }}</td>

                                <td>

                                      <form method="POST" action="{{route('reviews.destroy', $value->review_id) }}"  >
                                        @method('DELETE')
                                        @csrf

                                        <button  type="submit" class="btn btn-danger" style="color:#fff"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" align="center"><b>No Reviews Found</b></td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
