@extends('admin/layout/header')
@section('title', 'Ubah Divisi')

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
                                <input type="hidden" name="id_divisi" value="{{$divisi->id_divisi}}">
                                <div class="form-group">
                                    <label for="nm_divisi">Nama Divisi</label>
                                    <input type="text" name="nm_divisi" class="form-control" placeholder="Nama divisi..." value="{{$divisi->nm_divisi}}" required>
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