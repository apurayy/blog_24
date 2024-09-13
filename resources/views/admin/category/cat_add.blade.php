@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add New Category</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="{{ route('category.insert') }}" method="POST">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name" required>
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
@endsection
