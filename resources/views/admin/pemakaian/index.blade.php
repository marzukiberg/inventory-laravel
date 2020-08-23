@extends('admin/layout/header')
@section('title', 'Transaksi Pemakaian Barang')

@include('admin/layout/sidebar')
<!-- top navigation -->
@include('admin/layout/topnav')
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data @yield('title')</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tabel @yield('title')</h2>
                        @if(session('role')=='admin')
                        <a href="/admin/pemakaian/add" class="btn apptheme pull-right"><i class="fa fa-plus"></i></a>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Tabel pemakaian barang menampilkan data pemakaian barang yang ada di PT. X
                                    </p>
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                    @elseif(session('failed'))
                                    <div class="alert alert-danger">
                                        {{session('failed')}}
                                    </div>
                                    @endif
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Pemakaian</th>
                                                <th>Barang</th>
                                                <th>Karyawan</th>
                                                <th>Tanggal Pemakaian</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemakaian as $pk)
                                            <tr style="<?php
                                                        if ($pk->pk_status == 'menunggu') {
                                                            echo 'background-color: rgba(0,0,255,0.1)';
                                                        } elseif ($pk->pk_status == 'disetujui') {
                                                            echo 'background-color: rgba(0,255,0,0.1)';
                                                        } elseif ($pk->pk_status == 'ditolak') {
                                                            echo 'background-color: rgba(255,0,0,0.1)';
                                                        } else {
                                                            echo 'background-color: lightblue';
                                                        }
                                                        ?>">
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $pk->no_pemakaian }}</td>
                                                <td title=" {{ $pk->kd_barang }}">{{ $pk->nm_barang }}</td>
                                                <td title="{{ $pk->kd_karyawan }}">{{ $pk->nm_karyawan }}</td>
                                                <td><?php $dc = date_create($pk->tgl_beli);
                                                    echo date_format($dc, 'd F Y'); ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($pk->pk_status == 'menunggu') {
                                                        echo '<span class=text-primary>MENUNGGU PERSETUJUAN</span>';
                                                    } elseif ($pk->pk_status == 'disetujui') {
                                                        echo '<span class=text-success>DISETUJUI</span>';
                                                    } elseif ($pk->pk_status == 'ditolak') {
                                                        echo '<span class=text-danger>DITOLAK</span>';
                                                    } else {
                                                        echo '<span class=text-info>DIKEMBALIKAN</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>{{ $pk->pk_keterangan }}</td>
                                                <td>
                                                    @if(session('role')==='admin')
                                                    @if ($pk->pk_status == 'menunggu')
                                                    <a href="/admin/pemakaian/edit/{{$pk->no_pemakaian}}" class="btn apptheme"><i class="fa fa-edit fa-lg" title="Ubah renacana"></i> Perbarui</a>
                                                    <a href="/admin/pemakaian/delete/{{ $pk->no_pemakaian }}" class="btn apptheme-danger" title="Batalkan" onclick="return confirm('Lanjutkan menghapus?')"><i class="fa fa-trash"></i> Batalkan</a>
                                                    @elseif($pk->pk_status == 'disetujui')
                                                    <a href="/admin/pemakaian/cetak_ba/{{ $pk->no_pemakaian }}" target="_blank" class="btn btn-success" title="Cetak Berita Acara"><i class="fa fa-print"></i> Cetak BA</a>
                                                    @elseif($pk->pk_status=='ditolak')
                                                    <a href="/admin/pemakaian/delete/{{ $pk->no_pemakaian }}" class="btn apptheme-danger" title="Batalkan" onclick="return confirm('Lanjutkan menghapus?')"><i class="fa fa-trash"></i> Hapus</a>
                                                    @endif
                                                    @elseif(session('role')==='manager')
                                                    @if($pk->pk_status=='menunggu')
                                                    <a href="/admin/pemakaian/acc/{{ $pk->no_pemakaian }}" class="btn btn-success" title="Terima request ini" onclick="return confirm('Lanjutkan menerima?')"><i class="fa fa-check"></i> Acc</a>
                                                    <a href="/admin/pemakaian/delete/{{ $pk->no_pemakaian }}" class="btn apptheme-danger" title="Tolak" onclick="return confirm('Lanjutkan menolak?')"><i class="fa fa-times"></i> Tolak</a>
                                                    @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@extends('admin/layout/footer')