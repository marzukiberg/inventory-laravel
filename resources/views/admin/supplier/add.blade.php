@extends('admin/layout/header')
@section('title', 'Tambah Supplier')

@include('admin/layout/sidebar')
<!-- top navigation -->
@include('admin/layout/topnav')
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>@yield('title')</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="x_panel">
            <div class="x_title">
                <a href="/admin/supplier" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
                <h2>@yield('title')</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12c col-md-8">
                        <div class="card-box">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="kd_supplier">Kode</label>
                                    <?php

                                    $kdk = DB::table('tb_supplier')->max('kd_supplier');
                                    $oldcode = explode('SP', $kdk)[1];
                                    $newcode = str_pad($oldcode + 1, 4, 0, STR_PAD_LEFT);
                                    ?>
                                    <input type="text" class="form-control" name="kd_supplier" id="kd_supplier" value="<?= 'SP' . $newcode ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="nm_supplier">Nama</label>
                                    <input type="text" class="form-control" name="nm_supplier" id="nm_supplier" placeholder="Nama Supplier..." required />
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat...">
                                </div>
                                <div class="form-group">
                                    <label for="telp">No. HP</label>
                                    <input type="text" class="form-control" name="telp" placeholder="Nomor Telepon...">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email...">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block apptheme">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@extends('admin/layout/footer')