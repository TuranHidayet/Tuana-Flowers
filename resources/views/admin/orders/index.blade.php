@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
    @include('admin.partials.breadcrumb', ['title' => 'Orders'])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Orders</h3>
            </div>
            <div class="card-body">
                <table id="ordersTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Delivery Address</th>
                        <th>Phone</th>
                        <th>Notes</th>
                        <th>Order Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>${{ $order->total_price }}</td>
                            <td>{{ $order->delivery_address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->notes }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        $(function () {
            $('#ordersTable').DataTable();
        });
    </script>
@endsection
