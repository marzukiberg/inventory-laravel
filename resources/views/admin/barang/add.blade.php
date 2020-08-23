@extends('admin/layout/header')
@section('title', 'Tambah Barang')

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
                <a href="/admin/barang" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
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
                                    <label for="kd_barang">Kode</label>
                                    <?php

                                    $kdk = DB::table('tb_barang')->max('kd_barang');
                                    $oldcode = explode('BR', $kdk)[1];
                                    $newcode = str_pad($oldcode + 1, 4, 0, STR_PAD_LEFT);
                                    ?>
                                    <input type="text" class="form-control" name="kd_barang" id="kd_barang" value="<?= 'BR' . $newcode ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="nm_barang">Nama</label>
                                    <input type="text" class="form-control" name="nm_barang" id="nm_barang" placeholder="Nama Barang..." required />
                                </div>
                                <div class="form-group">
                                    <label for="kd_kategori">Kategori</label>
                                    <select name="kd_kategori" id="" class="form-control" required>
                                        <option value="">-- PILIH KATEGORI --</option>
                                        <?php
                                        $kategori = DB::table('tb_kategori')->get();
                                        ?>
                                        @foreach($kategori as $k)
                                        <option value="{{$k->kd_kategori}}">{{$k->nm_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_beli">Tanggal Beli</label>
                                    <input type="date" class="form-control" name="tgl_beli">
                                </div>
                                <div class="form-group">
                                    <label for="kd_supplier">Supplier</label>
                                    <select name="kd_supplier" id="kd_supplier" class="form-control" required>
                                        <option value="">-- SUPPLIER --</option>
                                        <?php
                                        $supplier = DB::table('tb_supplier')->get();
                                        ?>
                                        @foreach($supplier as $sp)
                                        <option value="{{$sp->kd_supplier}}">{{$sp->nm_supplier}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="merek">Merk</label>
                                    <input type="text" class="form-control" name="merek" placeholder="Merk barang...">
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Tipe</label>
                                    <input type="text" class="form-control" name="tipe" placeholder="Tipe barang...">
                                </div>
                                <div class="form-group">
                                    <label for="serial_number">Serial Number</label>
                                    <input type="text" class="form-control" name="serial_number" placeholder="Serial Number...">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control" placeholder="Keterangan..."></textarea>
                                </div>
                                <input type="hidden" name="status" value="ada">
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