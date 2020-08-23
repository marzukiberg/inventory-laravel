@extends('admin/layout/header')
@section('title', 'Ubah Transaksi Pemakaian')

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
                <a href="/admin/pemakaian" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
                <h2>@yield('title')</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="card-box">
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="no_pemakaian" value="{{$pk->no_pemakaian}}">
                                <div class="form-group">
                                    <label for="kd_barang">Barang</label>
                                    <select name="kd_barang" id="kd_barang" class="form-control" required>
                                        <option value="{{$pk->kd_barang}}">{{$pk->kd_barang}} - {{$pk->nm_barang}}</option>
                                        <?php
                                        $barang = DB::table('tb_barang')->where('status', '!=', 'dipinjam')->get();
                                        ?>
                                        @foreach($barang as $b)
                                        <option value="{{$b->kd_barang}}">
                                            {{$b->kd_barang}} - {{$b->nm_barang}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kd_karyawan">Karyawan</label>
                                    <select name="kd_karyawan" id="kd_karyawan" class="form-control" required>
                                        <option value="{{$pk->kd_karyawan}}">{{$pk->kd_karyawan}} - {{$pk->nm_karyawan}}</option>
                                        <?php
                                        $barang = DB::table('tb_karyawan')->get();
                                        ?>
                                        @foreach($barang as $b)
                                        <option value="{{$b->kd_karyawan}}">
                                            {{$b->kd_karyawan}} - {{$b->nm_karyawan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_pemakaian">Tanggal Pemakaian</label>
                                    <input type="date" name="tgl_pemakaian" id="tgl_pemakaian" class="form-control" value="{{$pk->tgl_pemakaian}}">
                                </div>

                                <input type="hidden" name="status" value="menunggu">

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="4" placeholder="Keterangan..." class="form-control">{{$pk->pk_keterangan}}</textarea>
                                </div>
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