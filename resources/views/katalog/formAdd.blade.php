@extends('layout.index')
@section('title', 'Form Add Katalog')
@section('titleTab', 'Form Add Katalog')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboardPage') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Form Add Katalog</li>
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
                <h4 class="header-title mb-4">Form Add Katalog</h4>
                <form action="{{ route('prosesAddKatalog') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-control" data-toggle="select2" data-width="100%" name="kategori_id">
                                    <option>Please Select Option</option>
                                    @php
                                        foreach ($kategori as $k) {
                                            echo "<option value='$k->id'>$k->kategori</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Ukuran</label>
                                <input autocomplete="off" type="text" class="form-control" name="ukuran" placeholder="Ukuran" required />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input autocomplete="off" type="text" class="form-control" name="harga" placeholder="Harga" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection