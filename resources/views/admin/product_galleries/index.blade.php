@extends('layouts.admin')

@section('title', 'Product Gallery')

@section('content')
    <div class=" m-4">
    <h1>Gallery for {{ $product->name }}</h1>
    <a href="{{ route('admin.product_galleries.create', $product->id) }}" class="btn btn-primary">Add Images</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($galleries as $key => $gallery)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $gallery->name }}</td>
                <td>
                    <img src="{{ Storage::url($gallery->image) }}" alt="image" width="100">
                </td>
                <td>
                    <form action="{{ route('admin.products.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection

