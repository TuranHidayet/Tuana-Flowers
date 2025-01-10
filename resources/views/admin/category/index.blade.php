@extends('layouts.admin')

@section('title', 'Category')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Categories'])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-warning mr-auto">Create Category</a>


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
                        <th>Name</th>
                        <th>Status</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ is_array($category->name) ? implode(', ', $category->name) : $category->name }}</td>

                            <td class="text-center">
                                @if($category->status)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else
                                    <span class="badge badge-pill badge-danger">No Active</span>
                                @endif
                            </td>

                            <td class="d-flex ">
                                @if(!$category->status)
                                    <a href="{{route('admin.category.change', ['id'=>$category->id])}}" onclick="confirm('Are you sure to change the status?')" class="btn btn-sm btn-info">Change</a>
                                @endif
                                    <a href="javascript:void(0);"
                                       onclick="deleteCategory('{{ route('admin.category.destroy', ['id' => $category->id]) }}')"
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
                text: "You won't delete this Category!",
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


