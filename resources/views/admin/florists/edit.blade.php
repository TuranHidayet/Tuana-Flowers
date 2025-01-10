@extends('layouts.admin')

@section('title', 'Edit Florist')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Edit Florist'])

    <div class="m-4">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('Edit Florist')}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.florists.update', ['id' => $florist->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $florist->name) }}" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $florist->email) }}" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $florist->phone) }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <textarea name="address" id="address" class="form-control">{{ old('address', $florist->address) }}</textarea>
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="florist_avatar">{{ __('Avatar') }}</label>
                            <input type="file" name="florist_avatar" id="florist_avatar" class="form-control">
                            @if($florist->florist_avatar)
                                <img src="{{ Storage::url($florist->florist_avatar) }}" alt="{{ $florist->name }}" width="100" height="70" class="mt-2">
                            @endif
                            @error('florist_avatar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <a href="{{ route('admin.florists.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

