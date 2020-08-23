@extends('admin/layout/header')
@section('title', 'Ubah Data Supplier')

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
                <a href="/admin/karyawan" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
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
                                    <label for="kd_supplier">Kode Supplier</label>
                                    <input type="text" class="form-control" name="kd_supplier" placeholder="Kode supplier..." value="{{$sp->kd_supplier}}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nm_supplier">Nama Supplier</label>
                                    <input type="text" class="form-control" name="nm_supplier" value="{{$sp->nm_supplier}}">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="{{$sp->alamat}}">
                                </div>

                                <div class="form-group">
                                    <label for="telp">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="telp" value="{{$sp->telp}}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$sp->email}}">
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