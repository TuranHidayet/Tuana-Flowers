@extends('layouts.admin')

@section('title', 'Contact')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Contact'])
<div class="m-4">
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
                    <tr class="text-center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $key => $contact)
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->subject}}</td>
                        <td>{{$contact->message}}</td>
                        <td>
                            @if($contact->status)
                                <span class="badge badge-pill badge-success">Read</span>
                            @else
                                <span class="badge badge-pill badge-danger">Unread</span>
                            @endif
                        </td>
                        <td class="d-flex ">
                            @if(!$contact->status)
                                <a href="{{route('admin.contact.read', ['id'=>$contact->id])}}" onclick="confirm('Are you sure to change status?')" class="btn btn-sm btn-info">Read</a>
                            @endif
                                <a href="javascript:void(0);"
                                   onclick="deleteCategory('{{ route('admin.contact.destroy', ['id' => $contact->id]) }}')"
                                   class="btn btn-sm btn-danger ml-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
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
</div>
@endsection



@section('customJs')
    <script>
        $(function () {
            $('#contactTable').DataTable();
        });
    </script>

    <script>
        var contactId = @json($contact->id);
    </script>

    <script>
        function deleteCategory(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't delete this Message!",
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
