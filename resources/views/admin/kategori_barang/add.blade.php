@extends('admin/layout/header')
@section('title', 'Tambah Kategori Barang')

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
                <a href="/admin/kategori_barang" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
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
                                    <label for="kd_kategori">Kode</label>
                                    <?php

                                    $kdk = DB::table('tb_kategori')->max('kd_kategori');
                                    $oldcode = explode('KT', $kdk)[1];
                                    $newcode = str_pad($oldcode + 1, 4, 0, STR_PAD_LEFT);
                                    ?>
                                    <input type="text" class="form-control" name="kd_kategori" id="kd_kategori" value="<?= 'KT' . $newcode ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="nm_kategori">Nama</label>
                                    <input type="text" class="form-control" name="nm_kategori" id="nm_kategori" placeholder="Nama Kategori..." required />
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