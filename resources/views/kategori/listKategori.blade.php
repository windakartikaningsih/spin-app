@extends('layout.index')
@section('title', 'List Kategori')
@section('titleTab', 'List Kategori')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboardPage') }}">Dashboard</a></li>
<li class="breadcrumb-item active">List Kategori</li>
@endsection()

@section('content')
<div class="row">
    <div class="col-lg-12 col-xl-12">
        <?php if($alert): ?>
        <div class="card m-b-30">
            <div class="card-body">
                <?= $alert ?>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">List Kategori</h4>
                <button type="button" class="btn btn-outline-primary waves-effect waves-light mb-4" data-bs-toggle="modal" data-bs-target="#FormAddKategori">
                    <i class="mdi mdi-file-plus-outline"></i>&nbsp;&nbsp;Add Kategori
                </button>

                <table id="key-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @php
                            $no = 1;
                            foreach ($kategori as $k) {
                                $button = '
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#FormEditKategori">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </button> | 
                                    <a href="'.route('prosesDeleteKategori', ['id' => $k->id]).'" type="button" class="btn btn-outline-danger waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </a>
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
@include('kategori.formAdd')
@include('kategori.formEdit')
@endsection