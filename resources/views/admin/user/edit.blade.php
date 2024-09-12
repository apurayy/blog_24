@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit User</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="{{ url('user/update/'.$getrecord->id) }}" method="POST">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input type="text" value="{{ $getrecord->name }}" class="form-control" id="inputNanme4" name="name" required>
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" value="{{ $getrecord->email }}" class="form-control" id="inputEmail4" name="email" required>
                </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="text" class="form-control" id="inputPassword4" name="password" >
                    <p>Do you want change password so please fill password input box</p>
                </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option {{ ($getrecord->status == 1) ? 'selected' : '' }} value="1">Active</option>
                        <option {{ ($getrecord->status == 0) ? 'selected' : '' }} value="0">Inactive</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
@endsection
