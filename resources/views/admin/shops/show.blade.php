@section('title', 'Shop')


@extends('layouts.admin')


@section('content')

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">About {{$shop->name}}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.shops.index') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ Storage::url($shop->logo) }}" alt="{{ $shop->name }}" class="img-fluid" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Shop Name:</th>
                                <td>{{ $shop->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $shop->phone }} </td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $shop->email }}</td>
                            </tr>

                            <tr>
                                <th>Address:</th>
                                <td>{{ $shop->address }}</td>
                            </tr>

                            <tr>
                                <th>Description:</th>
                                <td>{{ $shop->description }}</td>
                            </tr>

                            <tr>
                                <th>Created Date:</th>
                                <td>{{ $shop->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
