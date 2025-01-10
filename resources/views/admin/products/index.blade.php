@extends('layouts.admin')

@section('title', 'Product')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Product'])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.products.create')}}" class="btn btn-sm btn-warning">Create Product</a>

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
                    <tr>
                        <th>#</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key=>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{Storage::url($product->product_image)}}" alt="{{$product->name}}" width="100" height="70"></td>

                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                @if($product->stock === 'active')
                                    <span class="badge badge-pill badge-success">Available</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Not Available</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('admin.products.show', ['id'=>$product->id]) }}" class="btn btn-sm btn-info">Show</a>
                                <a href="{{ route('admin.products.edit', ['id'=>$product->id]) }}" class="btn btn-sm btn-primary mx-2">Edit</a>
                                <a href="javascript:void(0);"
                                   onclick="deleteCategory('{{ route('admin.products.destroy', ['id' => $product->id]) }}')"
                                   class="btn btn-sm btn-danger ml-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
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
            $('#contactTable').DataTable();
        });
    </script>

    <script>
        function deleteCategory(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't delete this Product!",
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
