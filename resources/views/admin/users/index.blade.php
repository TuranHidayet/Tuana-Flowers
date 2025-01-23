@extends('layouts.admin')

@section('title', 'Users')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Users'])

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
                <table id="usersTable" class="table table-bordered table-hover table-stripped">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Avatar</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Show</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><img src="{{Storage::url($user->avatar)}}" alt="{{$user->first_name}}" width="100" height="70"></td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <a href="{{route('admin.users.show', ['id'=>$user->id])}}" class="btn btn-sm btn-danger ml-2">Show</a>
                                @if($user->role == 'user')
                                    <form action="{{route('admin.users.makeAdmin', $user->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success ml-2">Make Admin</button>
                                    </form>
                                @else
                                    <span class="badge badge-info ml-2">Admin</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Avatar</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Show</th>
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
            $('#usersTable').DataTable();
        });
    </script>

@endsection
