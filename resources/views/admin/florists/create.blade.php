@extends('layouts.admin')

@section('title', 'Create Florist ')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Create Florist'])
<div class="mx-5">
    <form action="{{ route('admin.florists.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name" class="font-weight-bold">@lang('Florist Name')</label>
            <input type="text" id="name"
                   class="form-control  rounded @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="florist_avatar" class="font-weight-bold">@lang('Florist Avatar')</label>
            <input type="file" id="florist_avatar"
                   class="form-control-file @error('florist_avatar') is-invalid @enderror"
                   name="florist_avatar">
            @error('florist_avatar')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="font-weight-bold">@lang('Email')</label>
            <input type="email" id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone" class="font-weight-bold">@lang('Phone')</label>
            <input type="text" id="phone"
                   class="form-control @error('phone') is-invalid @enderror"
                   name="phone" value="{{ old('phone') }}">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address" class="font-weight-bold">@lang('Address')</label>
            <textarea id="address" name="address"
                      class="form-control @error('address') is-invalid @enderror"
                      rows="4">{{ old('address') }}</textarea>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
    </form>
</div>
@endsection
