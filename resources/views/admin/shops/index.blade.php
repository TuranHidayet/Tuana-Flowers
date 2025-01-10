@extends('layouts.admin')

@section('title', 'Shops')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Shops'])

    <section class="content">
        <div class="card">
            <div class="card-header">

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
                        <th>Logo</th>
                        <th>Shop Name</th>
                        <th>Description</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shops as $key => $shop)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td><img src="{{Storage::url($shop->logo)}}" alt="{{$shop->name}}" width="100" height="70"></td>
                        <td>{{$shop->name}}</td>
                        <td>{{$shop->description}}</td>
                        <td>{{$shop->phone}}</td>
                        <td>{{$shop->email}}</td>
                        <td>{{$shop->address}}</td>

                        <td class="d-flex">
                            <a href="{{ route('admin.shops.show', ['id'=>$shop->id]) }}" class="btn btn-sm btn-info">Show</a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Shop Name</th>
                        <th>Description</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>Address</th>
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

@endsection


