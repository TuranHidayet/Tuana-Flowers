@extends('layouts.admin')

@section('title', 'Product Create')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Product Create'])

                <div class="card card-primary mx-5">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @php
                                $shops = \App\Models\Shop::where('user_id', auth()->id())->get();
                            @endphp
                            <div class="form-group">
                                <label for="category_id" class="font-weight-bold">@lang('Store')</label>
                                <select name="shop_id" class="form-control custom-select">
                                    <option value="">{{ __('Select Store') }}</option>
                                    @foreach($shops as $shop)
                                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_id" class="font-weight-bold">@lang('Category')</label>
                                <select id="category_id" name="category_id" class="form-control custom-select">
                                    <option selected disabled>@lang('Select Category')</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="florist_id" class="font-weight-bold">@lang('Florist')</label>
                                <select id="florist_id" name="florist_id" class="form-control custom-select">
                                    <option selected disabled>@lang('Select Florist')</option>
                                    @foreach($florists as $florist)
                                        <option value="{{ $florist->id }}">{{ $florist->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group my-4">
                                <label for="product_image" class="font-weight-bold">@lang('Product Image')</label>
                                <input type="file" id="product_image"
                                       class="form-control-file border p-2 rounded @error('product_image') is-invalid @enderror"
                                       name="product_image">
                                @error('product_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-4">
                                <label for="galleries" class="font-weight-bold">@lang('Product Galleries Image')</label>
                                <input type="file" id="galleries"
                                       class="form-control-file border p-2 rounded @error('galleries[]') is-invalid @enderror"
                                       name="galleries[]" multiple>
                                @error('galleries[]')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name" class="font-weight-bold">@lang('Product Name')</label>
                                <input type="text" id="name"
                                       class="form-control rounded-pill @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" placeholder="@lang('Product Name')">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Product Description -->
                            <div class="form-group">
                                <label for="description" class="font-weight-bold">@lang('Product Description')</label>
                                <textarea id="description" name="description"
                                          class="form-control @error('description') is-invalid @enderror" rows="4"
                                          placeholder="@lang('Product Description')">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div class="form-group my-4">
                                <label for="price" class="font-weight-bold">@lang('Price')</label>
                                <input type="number" id="price" step="0.01"
                                       class="form-control rounded-pill @error('price') is-invalid @enderror"
                                       name="price" value="{{ old('price') }}" placeholder="@lang('Price in USD')">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Stock -->
                            <div class="form-group">
                                <label for="stock" class="font-weight-bold">@lang('Stock')</label>
                                <select id="stock" name="stock"
                                        class="form-control custom-select @error('stock') is-invalid @enderror">
                                    <option selected disabled>@lang('Select one')</option>
                                    <option value="active" {{ old('stock') == 'active' ? 'selected' : '' }}>@lang('Active')</option>
                                    <option value="not_active" {{ old('stock') == 'not_active' ? 'selected' : '' }}>@lang('Not Active')</option>
                                </select>
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-block rounded-pill py-2">
                                @lang('Elave et')
                            </button>
                        </form>
                    </div>
                </div>

@endsection

@section('customJs')
    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault();
            showAlert(
                "Success!",
                "Product Created successfully.",
                "success",
                "Close"
            );

            this.submit();
        });
    </script>
@endsection

