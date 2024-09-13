@extends('admin.layouts.app');

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="card_details">
                <h5 class="card-title">Category List
                    <a href="{{route('category.add')}}" style="float: right;" class="btn btn-primary">Add New</a>
                </h5>

                @if (session('success'))
                    <h6 class="text-success">{{ session('success') }}</h6>
                @endif

            </div>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $value)

                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{ !empty($value->status)? 'Active' : 'Inactive' }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at )) }}</td>
                        <td>
                            <a href="{{url('user/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete this user?');" href="{{url('user/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- End Table with stripped rows -->

            {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}

        </div>
    </div>
@endsection
