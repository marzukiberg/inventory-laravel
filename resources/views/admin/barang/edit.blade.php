@extends('admin/layout/header')
@section('title', 'Ubah Data Barang')

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
                    <div class="col-sm-12 col-md-8">
                        <div class="card-box">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="kd_barang">Kode Barang</label>
                                    <input type="text" class="form-control" value="{{$barang->kd_barang}}" name="kd_barang" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nm_barang">Nama Barang</label>
                                    <input type="text" class="form-control" value="{{$barang->nm_barang}}" name="nm_barang">
                                </div>

                                <div class="form-group">
                                    <label for="kd_kategori">Kategori</label>
                                    <select name="kd_kategori" id="" class="form-control">
                                        <option value="{{$barang->kd_kategori}}">{{$barang->nm_kategori}}</option>
                                        <?php
                                        $kategori = DB::table('tb_kategori')->get();
                                        ?>
                                        @foreach($kategori as $kt)
                                        <option value="{{$kt->kd_kategori}}">{{$kt->nm_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_beli">Tanggal Beli</label>
                                    <input type="date" class="form-control" value="{{$barang->tgl_beli}}" name="tgl_beli">
                                </div>

                                <div class="form-group">
                                    <label for="kd_supplier">Supplier</label>
                                    <select name="kd_supplier" id="" class="form-control">
                                        <option value="{{$barang->kd_supplier}}">{{$barang->nm_supplier}}</option>
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
                                    <input type="text" class="form-control" value="{{$barang->merek}}" name="merek">
                                </div>

                                <div class="form-group">
                                    <label for="tipe">Tipe</label>
                                    <input type="text" class="form-control" value="{{$barang->tipe}}" name="tipe">
                                </div>

                                <div class="form-group">
                                    <label for="serial_number">Serial Number</label>
                                    <input type="text" class="form-control" value="{{$barang->serial_number}}" name="serial_number">
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control">{{$barang->keterangan}}</textarea>
                                </div>
                                <input type="hidden" name="status" value="ada">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block apptheme">Perbarui</button>
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