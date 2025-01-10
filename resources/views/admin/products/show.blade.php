@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Product Details'])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">About Product</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ Storage::url($product->product_image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 588px; height: 712px;">
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Product Name:</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td>{{ $product->price }} ₼</td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($product->stock === 'active')
                                        <span class="badge badge-success">Mövcuddur</span>
                                    @else
                                        <span class="badge badge-danger">Mövcud deyil</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created Date:</th>
                                <td>{{ $product->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    <h4>Gallery Images:</h4>
                    <div class="row">
                        @foreach($product->galleries as $gallery)
                            <div class="col-md-3">
                                <img src="{{ Storage::url($gallery->image) }}" alt="Gallery Image" class="img-fluid mb-2" style="max-width: 100%; height: auto;">
                                <form action="{{ route('admin.products.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Bu şəkli silmək istədiyinizə əminsinizmi?')">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </section>

@endsection

