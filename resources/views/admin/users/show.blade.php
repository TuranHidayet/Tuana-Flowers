@section('title', 'User')


@extends('layouts.admin')


@section('content')

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">About {{$user->first_name}} {{$user->last_name}}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->first_name }}" class="img-fluid" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>User Name:</th>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $user->phone }} </td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $user->email }}</td>
                            </tr>

                            <tr>
                                <th>Role:</th>
                                <td>{{ $user->role }}</td>
                            </tr>

                            <tr>
                                <th>Created Date:</th>
                                <td>{{ $user->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
