@extends('layouts.admin')

@section('title', 'Update Settings ')

@section('content')

<div class="m-5">
    <div class="container">
        <h2>@lang('Update Settings')</h2>
        <form action="{{ route('admin.settings.update')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-4">
                <label for="title" class="font-weight-bold">Title</label>
                <input type="text" class="form-control rounded-pill @error('title') is-invalid @enderror" name="title" value="{{$setting->title}}" placeholder="Başlıq">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="company_name">@lang('Company Name')</label>
                <input type="text" id="company_name" name="company_name" class="form-control @error('company_name') is-invalid @enderror"
                       value="{{ old('company_name', $setting->company_name) }}">
                @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">@lang('Description')</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">
                    {{ old('description', $setting->description) }}
                </textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">@lang('Email')</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $setting->email) }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">@lang('Address')</label>
                <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="2">
                    {{ old('address', $setting->address) }}
                </textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">@lang('Phone')</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                       value="{{ old('phone', $setting->phone) }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_title">@lang('Meta Title')</label>
                <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror"
                       value="{{ old('meta_title', $setting->meta_title) }}">
                @error('meta_title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_description">@lang('Meta Description')</label>
                <textarea id="meta_description" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="3">
                    {{ old('meta_description', $setting->meta_description) }}
                </textarea>
                @error('meta_description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-4">
                <label for="set_image" class="font-weight-bold">Setting Image</label>
                <input type="file" class="form-control-file border p-2 rounded @error('set_image') is-invalid @enderror" name="set_image">
                @error('set_image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="instagram">@lang('Instagram')</label>
                <input type="url" id="instagram" name="instagram" class="form-control @error('instagram') is-invalid @enderror"
                       value="{{ old('instagram', $setting->instagram) }}">
                @error('instagram')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="facebook">@lang('Facebook')</label>
                <input type="url" id="facebook" name="facebook" class="form-control @error('facebook') is-invalid @enderror"
                       value="{{ old('facebook', $setting->facebook) }}">
                @error('facebook')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="twitter">@lang('Twitter')</label>
                <input type="url" id="twitter" name="twitter" class="form-control @error('twitter') is-invalid @enderror"
                       value="{{ old('twitter', $setting->twitter) }}">
                @error('twitter')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="linkedin">@lang('LinkedIn')</label>
                <input type="url" id="linkedin" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror"
                       value="{{ old('linkedin', $setting->linkedin) }}">
                @error('linkedin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">@lang('Update Settings')</button>
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
                "Settings Updated successfully.",
                "success",
                "Close"
            );

            this.submit();
        });
    </script>
@endsection
