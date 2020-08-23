@extends('admin/layout/header')
@section('title', 'Kategori Barang')

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
                        <a href="/admin/kategori_barang/add" class="btn apptheme pull-right"><i class="fa fa-plus"></i></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Tabel barang menampilkan data kategori barang yang ada di PT. X
                                    </p>
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success')}}
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
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Jumlah Barang Tersedia</th>
                                                <th>Jumlah Barang Terpakai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kategori_barang as $kb)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $kb->kd_kategori }}</td>
                                                <td>{{ $kb->nm_kategori }}</td>
                                                <td><?php
                                                    $brg_tersedia = DB::table('tb_barang')->where(['kd_kategori' => $kb->kd_kategori, 'status' => 'ada'])->count();
                                                    echo $brg_tersedia;
                                                    ?></td>
                                                <td><?php
                                                    $brg_terpakai = DB::table('tb_barang')->where(['kd_kategori' => $kb->kd_kategori, 'status' => 'pakai'])->count();
                                                    echo $brg_terpakai;
                                                    ?></td>
                                                <td>
                                                    <a href="/admin/kategori_barang/edit/{{ $kb->kd_kategori }}" class="btn apptheme"><i class="fa fa-edit"></i></a>
                                                    <a href="/admin/kategori_barang/delete/{{ $kb->kd_kategori }}" class="btn apptheme-danger"><i class="fa fa-trash"></i></a>
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