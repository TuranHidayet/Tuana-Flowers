@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Product Details'])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">About Product</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ Storage::url($product->product_image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 300px; height: 350px;">
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Product Name:</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td>{{ $product->price }} ₼</td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($product->stock === 'active')
                                        <span class="badge badge-success">Mövcuddur</span>
                                    @else
                                        <span class="badge badge-danger">Mövcud deyil</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created Date:</th>
                                <td>{{ $product->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        </table>
                        <div class="card-footer">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="javascript:void(0);"
                               onclick="deleteCategory('{{ route('admin.products.destroy', ['id' => $product->id]) }}')"
                               class="btn btn-sm btn-danger ml-2">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <h4 class="text-center">Gallery Images:</h4>
                    @if($product->galleries && $product->galleries->count() > 0)
                        <div class="row">
                            @foreach($product->galleries as $gallery)
                                <div class="col-md-3">
                                    <img src="{{ Storage::url($gallery->path) }}" alt="Gallery Image" class="img-fluid mb-2" style="max-width: 100%; height: 250px;">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">No Gallery Image</p>
                    @endif
                </div>
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

    <script>
        document.querySelector('#deleteProduct').addEventListener('submit', function (e) {
            e.preventDefault();
            showAlert(
                "Success!",
                "Product deleted successfully.",
                "success",
                "Close"
            );

            this.submit();
        });

    </script>
@endsection

