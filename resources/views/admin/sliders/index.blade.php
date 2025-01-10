@extends('layouts.admin')

@section('title', 'Slider')

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
                        <th>short desc</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $key => $slider)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td><img src="{{Storage::url($slider->image)}}" alt="{{$slider->name}}" width="100" height="70"></td>

                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->short_desc }}</td>
                            <td>{{ $slider->description }}</td>

                            <td class="d-flex">
                                <a href="{{ route('admin.slider.edit', ['id'=>$slider->id]) }}" class="btn btn-sm btn-primary mx-2">Edit</a>
                                <a href="javascript:void(0);"
                                   onclick="deleteCategory('{{ route('admin.slider.destroy', ['id' => $slider->id]) }}')"
                                   class="btn btn-sm btn-danger ml-2">Delete</a>
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

    <script>
        function deleteCategory(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't delete this Slider!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
@endsection

