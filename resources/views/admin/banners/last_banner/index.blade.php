@extends('layouts.admin')

@section('title', 'Banner')

@section('content')


    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.slider.create')}}" class="btn btn-sm btn-warning mr-auto">Create Slider</a>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table id="contactTable" class="table table-bordered table-hover table-stripped">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banners as $key => $banner)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td><img src="{{Storage::url($slider->image)}}" alt="{{$banner->name}}" width="100" height="70"></td>

                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->description }}</td>

                            <td class="d-flex">
                                <a href="{{ route('admin.banners.last_banner.edit', ['id'=>$banner->id]) }}" class="btn btn-sm btn-primary mx-2">Edit</a>
                                <a href="{{route('admin.banners.last_banner.destroy', ['id'=>$banner->id])}}" onclick="confirm('Are you sure to delete?')" class="btn btn-sm btn-danger ml-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>

@endsection

@section('customJs')
    <script>
        $(function () {
            $('#usersTable').DataTable();
        });
    </script>
@endsection

