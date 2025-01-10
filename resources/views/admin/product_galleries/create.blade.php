@extends('layouts.admin')

@section('title', 'Add Gallery Images')

@section('content')
<div class=" m-4">
    <h1>Add Images to {{ $product->name }}</h1>

    <form action="{{ route('admin.product_galleries.store', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="images">Select Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple required>
        </div>
        <button type="submit" class="btn btn-success">Upload</button>
    </form>
</div>
@endsection

