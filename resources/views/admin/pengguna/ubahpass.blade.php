@extends('admin/layout/header')
@section('title', 'Ubah Password')

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
                <a href="/admin/pengguna" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
                <h2>@yield('title')</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @elseif(session('failed'))
                <div class="alert alert-danger">
                    {{session('failed')}}
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="card-box">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="passlama">Password Lama</label>
                                    <input type="password" name="passlama" class="form-control" placeholder="Password lama..." required>
                                </div>
                                <div class="form-group">
                                    <label for="passbaru">Password Baru</label>
                                    <input type="password" name="passbaru" class="form-control" placeholder="Password baru..." required>
                                </div>
                                <div class="form-group">
                                    <label for="passbaru2">Konfirmasi Password Baru</label>
                                    <input type="password" name="passbaru2" class="form-control" placeholder="Konfirmasi password baru..." required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-block apptheme" type="submit">Ubah</button>
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