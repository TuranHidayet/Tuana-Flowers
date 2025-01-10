@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Create Category'])

    <div class="mx-5">
        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group my-4">
                <label for="name_en" class="font-weight-bold">Name</label>
                <input type="text" class="form-control rounded-pill @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}" placeholder="Category Name " >
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-4">
                <label for="status" class="font-weight-bold">Status</label>
                <select class="form-control" name="status">
                    <option value="1" selected>Active</option>
                    <option value="0">Passive</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block rounded-pill py-2">Əlavə Et</button>
        </form>
    </div>

@endsection

@section('customJs')
    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault();
            showAlert(
                "Success!",
                "Category Created successfully.",
                "success",
                "Close"
            );

            this.submit();
        });
    </script>
@endsection
