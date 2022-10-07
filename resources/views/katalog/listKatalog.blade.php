@extends('layout.index')
@section('title', 'List Katalog')
@section('titleTab', 'List Katalog')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboardPage') }}">Dashboard</a></li>
<li class="breadcrumb-item active">List Katalog</li>
@endsection()

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">List Katalog</h4>

                <table id="key-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Katgori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @php
                            $no = 1;
                            foreach ($katalog as $k) {
                                $button = '
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#FormEditKatalog">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </button> | 
                                    <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </button>
                                ';
                                echo "
                                    <tr>
                                        <td>$no</td>
                                        <td>$k->kategori</td>
                                        <td>$button</td>
                                    </tr>
                                ";
                                $no++;
                            }
                        @endphp
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection