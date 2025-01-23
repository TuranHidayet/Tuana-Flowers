@extends('layouts.app')

@section('title', 'Products')

@section('content')
    {{--    <!-- Admin LTE 3 -->--}}
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!--Admin  Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


<div class="container ">
    <section class="content pt-5">
        <div class="card ">
            <div class="card-header ">
                <a href="{{route('app.products.create')}}" class="btn btn-sm btn-warning">Create Product</a>
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
                        <th class="text-center">Operations</th>
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
                                <button
                                    class="btn btn-sm toggle-status-btn
                                    {{ $product->stock === 'active' ? 'btn-success' : 'btn-danger' }}"
                                    data-id="{{ $product->id }}">
                                    {{ $product->stock === 'active' ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="d-flex pb-5">
                                <a href="{{ route('app.products.show', ['slug'=>$product->slug]) }}" class="btn btn-sm btn-info">Show</a>
                                <a href="{{ route('app.products.edit', ['id'=>$product->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="javascript:void(0);"
                                   onclick="deleteCategory('{{ route('admin.products.destroy', ['id' => $product->id]) }}')"
                                   class="btn btn-sm btn-danger">Delete</a>
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
                        <th class="text-center">Operations</th>
                    </tr>
                    </tfoot>
                </table>
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


{{--    active - non active--}}
    <script>
        $(document).on('click', '.toggle-status-btn', function() {
            const button = $(this);
            const productId = button.data('id');

            $.ajax({
                url: "{{ url('/products') }}/" + productId + "/toggle-status",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        if (response.new_status === 'active') {
                            button.removeClass('btn-danger').addClass('btn-success');
                            button.text('Active');
                        } else {
                            button.removeClass('btn-success').addClass('btn-danger');
                            button.text('Inactive');
                        }
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Something went wrong. Please try again.');
                }
            });
        });

    </script>
@endsection
