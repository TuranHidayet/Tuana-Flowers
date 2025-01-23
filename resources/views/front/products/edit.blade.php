@extends('layouts.app')

@section('title', 'Product Edit')

@section('content')

    @include('front.partials.breadcrumb', ['title' => 'Product Edit'])

    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">@lang('Edit Product')</h5>
                <a href="{{ route('app.products.index') }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-arrow-left"></i> @lang('Back To List')
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('app.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label for="category_id" class="font-weight-bold">@lang('Category')</label>
                            <select id="category_id" name="category_id" class="form-control custom-select">
                                <option selected disabled>@lang('Select Category')</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="florist_id" class="font-weight-bold">@lang('Florist')</label>
                            <select id="florist_id" name="florist_id" class="form-control custom-select">
                                <option selected disabled>@lang('Select Florist')</option>
                                @foreach($florists as $florist)
                                    <option value="{{ $florist->id }}" {{ $product->florist_id == $florist->id ? 'selected' : '' }}>
                                        {{ $florist->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product_image" class="font-weight-bold">@lang('Product Image')</label>
                        <input type="file" id="product_image" name="product_image" class="form-control-file @error('product_image') is-invalid @enderror">
                        @if($product->product_image)
                            <img src="{{ asset($product->product_image) }}" alt="@lang('Product Image')" class="img-thumbnail mt-2" width="150">
                        @endif
                        @error('product_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">@lang('Product Name')</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('Product Name')">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="font-weight-bold">@lang('Product Description')</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="@lang('Product Description')">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price" class="font-weight-bold">@lang('Price')</label>
                            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" class="form-control @error('price') is-invalid @enderror" placeholder="@lang('Price in USD')">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="stock" class="font-weight-bold">@lang('Stock')</label>
                            <select id="stock" name="stock" class="form-control custom-select @error('stock') is-invalid @enderror">
                                <option selected disabled>@lang('Select one')</option>
                                <option value="active" {{ old('stock', $product->stock) == 'active' ? 'selected' : '' }}>@lang('Active')</option>
                                <option value="not_active" {{ old('stock', $product->stock) == 'not_active' ? 'selected' : '' }}>@lang('Not Active')</option>
                            </select>
                            @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block rounded-pill py-2">
                        <i class="fas fa-save"></i> @lang('Update Product')
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
