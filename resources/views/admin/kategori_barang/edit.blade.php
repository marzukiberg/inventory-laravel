@extends('admin/layout/header')
@section('title', 'Edit Kategori')

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
                <a href="/admin/kategori_barang" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
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
                                    <label for="kd_kategori">Kode</label>
                                    <input type="text" class="form-control" name="kd_kategori" id="kd_kategori" value="{{$kt->kd_kategori}}" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="nm_kategori">Nama</label>
                                    <input type="text" class="form-control" name="nm_kategori" id="nm_kategori" placeholder="Nama Kategori..." value="{{$kt->nm_kategori}}" required />
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