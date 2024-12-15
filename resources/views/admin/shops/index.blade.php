@extends('layouts.admin')

@section('title', 'Shops')

@section('content')

    @include('admin.partials.breadcrumb', ['title' => 'Shops'])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Shops')}}</h3>

                <a href="" class="btn btn-sm btn-warning mr-auto ml-5">Create</a>

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
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td>5</td>
                        <td>C</td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5
                        </td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 6
                        </td>
                        <td>Win 98+</td>
                        <td>6</td>
                        <td>A</td>
                    </tr>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
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


