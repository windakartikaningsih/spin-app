@extends('layout.index')
@section('title', 'Form Edit Katalog')
@section('titleTab', 'Form Edit Katalog')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboardPage') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Form Edit Katalog</li>
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
                <h4 class="header-title mb-4">Form Edit Katalog</h4>
                <form action="{{ route('prosesEditKatalog') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-control" data-toggle="select2" data-width="100%" name="kategori_id">
                                    <option>Please Select Option</option>
                                    @php
                                        foreach ($kategori as $k) {
                                            if($katalog->id == $k->id) 
                                            {
                                                $sel = 'selected';
                                            }else{
                                                $sel = '';
                                            }
                                            echo "<option value='$k->id' $sel>$k->kategori</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Ukuran</label>
                                <input autocomplete="off" type="text" class="form-control" name="ukuran" placeholder="Ukuran" value="{{ $katalog->ukuran }}" required />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input autocomplete="off" type="text" class="form-control" name="harga" placeholder="Harga" value="{{ $katalog->harga }}" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                <input type="text" class="form-control" name="id" placeholder="Harga" value="{{ $katalog->katalog_id }}" hidden />
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