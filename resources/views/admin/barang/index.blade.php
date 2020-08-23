@extends('admin/layout/header')
@section('title', 'Barang')

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
                        <a href="/admin/barang/add" class="btn apptheme pull-right"><i class="fa fa-plus"></i></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Tabel barang menampilkan data semua barang yang ada di PT. X
                                    </p>
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success')}}
                                    </div>
                                    @elseif(session('failed'))
                                    <div class="alert alert-danger">
                                        {{ session('failed')}}
                                    </div>
                                    @endif
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Tanggal Beli</th>
                                                <th>Supplier</th>
                                                <th>Merek</th>
                                                <th>Tipe</th>
                                                <th>Serial Number</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barang as $brg)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $brg->kd_barang }}</td>
                                                <td>{{ $brg->nm_barang }}</td>
                                                <td>{{ $brg->nm_kategori }}</td>
                                                <td><?php $dc = date_create($brg->tgl_beli);
                                                    echo date_format($dc, 'd F Y'); ?>
                                                </td>
                                                <td>{{ $brg->nm_supplier }}</td>
                                                <td>{{ $brg->merek }}</td>
                                                <td>{{ $brg->tipe }}</td>
                                                <td>{{ $brg->serial_number }}</td>
                                                <td>{{ $brg->keterangan }}</td>
                                                <td>{{ strtoupper($brg->status) }}</td>
                                                <td>
                                                    <a href="/admin/barang/edit/{{ $brg->kd_barang }}" class="btn apptheme"><i class="fa fa-edit"></i></a>
                                                    <a href="/admin/barang/delete/{{ $brg->kd_barang }}" class="btn apptheme-danger"><i class="fa fa-trash"></i></a>
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