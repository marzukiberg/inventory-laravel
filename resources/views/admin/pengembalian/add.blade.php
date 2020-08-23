@extends('admin/layout/header')
@section('title', 'Transaksi Pengembalian Pemakaian')

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
                <a href="/admin/pengembalian" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
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
                                    <label for="no_pemakaian">Pemakaian</label>
                                    <select name="no_pemakaian" id="no_pemakaian" class="form-control" required>
                                        <option value="">-- PILIH BARANG --</option>
                                        <?php
                                        $pemakaian = DB::table('tb_pemakaian')->join('tb_barang', 'tb_pemakaian.kd_barang', '=', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', '=', 'tb_karyawan.kd_karyawan')->where('tb_pemakaian.status', '=', 'disetujui')->get();
                                        ?>
                                        @foreach($pemakaian as $p)
                                        <option value="{{$p->no_pemakaian}}">{{$p->nm_barang}} / {{$p->nm_karyawan}} / Tanggal Pakai:
                                            <?php
                                            $dc = date_create($p->tgl_pemakaian);
                                            ?>{{date_format($dc, 'd M Y')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block apptheme">Kembalikan</button>
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