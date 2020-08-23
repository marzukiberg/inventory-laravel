@extends('admin/layout/header')
@section('title', 'Transaksi Pengembalian Barang')

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
                        <a href="/admin/pengembalian/add" class="btn apptheme pull-right"><i class="fa fa-plus"></i></a>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Tabel pengembalian barang menampilkan data pengembalian barang yang ada di PT. X
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
                                                <th>Tanggal Pengembalian</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengembalian as $pk)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $pk->no_pemakaian }}</td>
                                                <td title=" {{ $pk->kd_barang }}">{{ $pk->nm_barang }}</td>
                                                <td title="{{ $pk->kd_karyawan }}">{{ $pk->nm_karyawan }}</td>
                                                <td><?php $dc = date_create($pk->tgl_beli);
                                                    echo date_format($dc, 'd F Y'); ?>
                                                </td>
                                                <td><?php $dc = date_create($pk->tgl_pengembalian);
                                                    echo date_format($dc, 'd F Y'); ?>
                                                </td>
                                                <td>{{ $pk->pk_keterangan }}</td>
                                                <td>

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