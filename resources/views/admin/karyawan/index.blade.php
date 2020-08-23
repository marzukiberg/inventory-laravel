@extends('admin/layout/header')
@section('title', 'Karyawan')

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
            <div class="col-md-8 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tabel @yield('title')</h2>
                        <a href="/admin/karyawan/add" class="btn apptheme pull-right"><i class="fa fa-plus"></i></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Tabel karyawan menampilkan data semua karyawan yang bekerja di PT. X
                                    </p>
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                    @endif
                                    @if(session('failed'))
                                    <div class="alert alert-failed">
                                        {{session('failed')}}
                                    </div>
                                    @endif
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Divisi</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($karyawan as $kw)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $kw->kd_karyawan }}</td>
                                                <td>{{ $kw->nm_karyawan }}</td>
                                                <td>{{ $kw->nm_divisi }}</td>
                                                <td>{{ $kw->alamat }}</td>
                                                <td>
                                                    <a href="/admin/karyawan/edit/{{ $kw->kd_karyawan }}" class="btn apptheme"><i class="fa fa-edit"></i></a>
                                                    <a href="/admin/karyawan/delete/{{ $kw->kd_karyawan }}" class="btn apptheme-danger"><i class="fa fa-trash"></i></a>
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

            <div class="col-md-4 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tabel Divisi</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <a href="#" data-toggle="modal" data-target="#add-divisi" class="btn apptheme pull-right"><i class="fa fa-plus"></i></a>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Tabel divisi menampilkan divisi apa saja yang ada di perusahaan
                                    </p>

                                    @if(session('divsuccess'))
                                    <div class="alert alert-success">
                                        {{session('divsuccess')}}
                                    </div>
                                    @elseif(session('divfailed'))
                                    <div class="alert alert-danger">
                                        {{session('divfailed')}}
                                    </div>
                                    @endif

                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Divisi</th>

                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($divisi as $dv)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $dv->nm_divisi }}</td>
                                                <td>
                                                    <a href="/admin/karyawan/edit_divisi/{{ $dv->id_divisi }}" class="btn apptheme"><i class="fa fa-edit"></i></a>
                                                    <a href="/admin/karyawan/delete_divisi/{{ $dv->id_divisi }}" class="btn apptheme-danger"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="add-divisi">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Divisi Baru</h5>
            </div>
            <div class="modal-body">
                <form action="/admin/karyawan/adddiv" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nm_divisi">Nama Divisi</label>
                        <input type="text" name="nm_divisi" id="nm_divisi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block apptheme">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@extends('admin/layout/footer')