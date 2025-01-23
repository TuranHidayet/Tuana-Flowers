@extends('layouts.app')

@section('title', 'Shop Edit')

@section('content')

    @include('front.partials.breadcrumb', ['title' => 'Shop Edit'])

    <div class="card card-primary mx-5">
        <div class="card-header">

            <div class="card-tools">
                <a href="{{ route('app.products.index') }}" class="btn btn-sm btn-warning">Back To List</a>
            </div>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>


        <div class="card-body">
            <form id="editShopForm" action="{{ route('app.shops.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="font-weight-bold">@lang('Shop Name')</label>
                    <input type="text" id="name"
                           class="form-control rounded-pill @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name', $shop->name) }}" placeholder="@lang('Shop Name')">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">@lang('About Shop')</label>
                    <textarea id="description" name="description"
                              class="form-control @error('description') is-invalid @enderror" rows="4"
                              placeholder="@lang('Shop Description')">{{ old('description', $shop->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone" class="font-weight-bold">@lang('Phone')</label>
                    <input type="tel" id="phone"
                           class="form-control rounded-pill @error('phone') is-invalid @enderror"
                           name="phone" value="{{ old('phone', $shop->phone) }}" placeholder="@lang('Phone')">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="font-weight-bold">@lang('Email')</label>
                    <input type="email" id="email"
                           class="form-control rounded-pill @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email', $shop->email) }}" placeholder="@lang('Email')">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="font-weight-bold">@lang('Address')</label>
                    <input type="text" id="address"
                           class="form-control rounded-pill @error('address') is-invalid @enderror"
                           name="address" value="{{ old('address', $shop->address) }}" placeholder="@lang('Address')">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="product_image" class="font-weight-bold">@lang('Shop Logo')</label>
                    <input type="file" id="logo"
                           class="form-control-file border p-2 rounded @error('logo') is-invalid @enderror"
                           name="logo">
                    @if($shop->logo)
                        <img src="{{ asset($shop->logo) }}" alt="@lang('Shop Logo')" class="img-thumbnail mt-2" width="150">
                    @endif
                    @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary btn-block rounded-pill py-2">
                    @lang('Update Shop')
                </button>
            </form>
        </div>
    </div>

@endsection

@section('customJs')
    <script>
        document.querySelector('#editShopForm').addEventListener('submit', function (e) {
            e.preventDefault();
            showAlert(
                "Success!",
                "Shop Created successfully.",
                "success",
                "Close"
            );

            this.submit();
        });
    </script>
@endsection
