@extends('layout.index')
@section('title', 'List Katalog')
@section('titleTab', 'List Katalog')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboardPage') }}">Dashboard</a></li>
<li class="breadcrumb-item active">List Katalog</li>
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
                <h4 class="header-title mb-2">List Katalog</h4>
                <a href="{{ route('formAddKatalog') }}" type="button" class="btn btn-outline-primary waves-effect waves-light mb-4">
                    <i class="mdi mdi-file-plus-outline"></i>&nbsp;&nbsp;Add Katalog
                </a>
                <form action="<?= route('getListKatalog') ?>" method="GET" class="mb-4">
                    <div class="form-material">
                        <div class="row">
                            <div class="col-md-3"> 
                                <input autocomplete="off" type="text" class="form-control" placeholder="Kategori" id="kategori" name="kategori" value="<?= $kategori ?>" />
                            </div>
                            <div class="col-md-3"> 
                                <input autocomplete="off" type="text" class="form-control" placeholder="Ukuran" id="ukuran" name="ukuran" value="<?= $ukuran ?>" />
                            </div>
                            <div class="col-md-3"> 
                                <input autocomplete="off" type="text" class="form-control" placeholder="Harga" id="harga" name="harga" value="<?= $harga ?>" />
                            </div>
                            <div class="col-md-3"> 
                                <button type="submit" class="btn btn-primary" style="width: 270px; height: 38px;"><i class="dripicons-search"></i> Cari</button>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

                <table id="key-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @php
                            $no = 1;
                            if(!empty($katalog)){
                                foreach ($katalog as $k) {
                                    $button = '
                                        <button type="button" class="btn btn-outline-info waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#DetailKatalog">
                                            <i class="mdi mdi-eye"></i>
                                        </button> | 
                                        <a href="'.route('formEditKatalog', ['id' => $k->katalog_id]).'" type="button" class="btn btn-outline-success waves-effect waves-light" data-bs-toggle="tooltip">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a> | 
                                        <a href="'.route('prosesDeleteKatalog', ['id' => $k->katalog_id]).'" type="button" class="btn btn-outline-danger waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </a>
                                    ';
                                    echo "
                                        <tr>
                                            <td>$no</td>
                                            <td>$k->kategori</td>
                                            <td>$k->ukuran</td>
                                            <td>".number_format($k->harga, 0, '', '.')."</td>
                                            <td class='text-center'>$button</td>
                                        </tr>
                                    ";
                                    $no++;
                                }
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