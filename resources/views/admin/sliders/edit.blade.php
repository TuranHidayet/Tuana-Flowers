@extends('layouts.admin')

@section('title', 'Edit Slider')

@section('content')

    <div class="m-4">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('Edit Slider')}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-4">
                            <label for="title" class="font-weight-bold">Title</label>
                            <input type="text" class="form-control rounded-pill @error('title') is-invalid @enderror"  name="title" value="{{ old('title', $slider->title) }}"  placeholder="Title" >
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label for="short_desc" class="font-weight-bold">Short Desc</label>
                            <input type="text" class="form-control rounded-pill @error('short_desc') is-invalid @enderror"  name="short_desc" value="{{ old('short_desc', $slider->short_desc) }}" placeholder="Short desc" >
                            @error('short_desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label for="description" class="font-weight-bold">Description</label>
                            <input type="text" class="form-control rounded-pill @error('description') is-invalid @enderror"  name="description" value="{{ old('description', $slider->description) }}" placeholder="Description" >
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

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <a href="{{ route('admin.slider.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

