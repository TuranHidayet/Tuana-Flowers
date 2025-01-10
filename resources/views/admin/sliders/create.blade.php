@extends('layouts.admin')

@section('title', 'Create Slider')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Create Slider'])

<div class="mx-5">
    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group my-4">
        <label for="name_en" class="font-weight-bold">Title</label>
        <input type="text" class="form-control rounded-pill @error('title') is-invalid @enderror"  name="title" value="{{old('title')}}" placeholder="Title" >
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group my-4">
        <label for="name_en" class="font-weight-bold">Short Desc</label>
        <input type="text" class="form-control rounded-pill @error('short_desc') is-invalid @enderror"  name="short_desc" value="{{old('short_desc')}}" placeholder="Short desc" >
        @error('short_desc')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group my-4">
        <label for="name_en" class="font-weight-bold">Description</label>
        <input type="text" class="form-control rounded-pill @error('description') is-invalid @enderror"  name="description" value="{{old('description')}}" placeholder="Description" >
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group my-4">
        <label for="image" class="font-weight-bold">@lang('Image')</label>
        <input type="file" id="image"
               class="form-control-file border p-2 rounded @error('image') is-invalid @enderror"
               name="image">
        @error('image')
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
                "Sliders Created successfully.",
                "success",
                "Close"
            );

            this.submit();
        });
    </script>
@endsection
