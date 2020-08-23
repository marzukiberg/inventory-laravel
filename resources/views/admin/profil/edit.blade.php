@extends('admin/layout/header')
@section('title', 'Ubah Profil')

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
                <a href="/admin/profil" class="d-block"><i class="fa fa-arrow-left fa-lg"></i></a>
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
                                <input type="hidden" name="id" value="{{$user->id_pengguna}}">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username..." value="<?= $user->username ?>" required>
                                    <small class="text-danger">Harap mengubah username yang tidak terdaftar pada sistem</small>
                                </div>

                                <hr />
                                <label for="ubahpass" class="text-danger"><b>UBAH PASSWORD, KOSONGKAN JIKA TIDAK INGIN MEMPERBARUI PASSWORD</b></label>

                                <div class="form-group">
                                    <label for="passlama">Password Lama</label>
                                    <input type="password" class="form-control" name="passlama" placeholder="Password lama...">
                                </div>

                                <div class="form-group">
                                    <label for="passbaru">Password Baru</label>
                                    <input type="password" class="form-control" name="passbaru" placeholder="Password baru...">
                                </div>

                                <div class="form-group">
                                    <label for="passbaru1">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="passbaru1" placeholder="Konfirmasi password baru...">
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