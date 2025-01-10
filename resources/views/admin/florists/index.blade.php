@extends('layouts.admin')

@section('title', 'Florists')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Florists'])
<div class="m-4">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.florists.create')}}" class="btn btn-sm btn-warning">Create</a>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body mx-4">
                <table id="contactTable" class="table table-bordered table-hover table-stripped">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($florists as $key => $florist)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td><img src="{{Storage::url($florist->florist_avatar)}}" alt="{{$florist->name}}" width="100" height="70"></td>
                            <td>{{ $florist->name }}</td>
                            <td>{{ $florist->email }}</td>
                            <td>{{ $florist->phone ?? 'N/A' }}</td>
                            <td>{{ $florist->address }}</td>
                            <td class="d-flex">
{{--                                <a href="{{ route('admin.florists.show', ['id'=>$florist->id]) }}" class="btn btn-sm btn-info">Show</a>--}}
                                <a href="{{ route('admin.florists.edit', ['id'=>$florist->id]) }}" class="btn btn-sm btn-primary mx-2">Edit</a>
                                <a href="{{ route('admin.florists.destroy', ['id'=>$florist->id]) }}" onclick="confirm('Are you sure to delete Florist?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
</div>
@endsection

@section('customJs')
    <script>
        $(function () {
            $('#contactTable').DataTable();
        });
    </script>
@endsection

