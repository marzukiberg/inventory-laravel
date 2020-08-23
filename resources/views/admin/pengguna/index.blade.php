@extends('admin/layout/header')
@section('title', 'Pengguna')

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

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Tabel menunjukkan pengguna aplikasi.
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
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengguna as $p)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$p->username}}</td>
                                                <td><span class="text-muted">tersembunyi</span>
                                                    @if(session('username')==$p->username)
                                                    <br />
                                                    <a href="/admin/pengguna/ubahpass/{{$p->username}}" class="text-danger"><small>ubah password</small></a>
                                                    @endif
                                                </td>
                                                <td>{{strtoupper($p->role)}}</td>
                                                <td>
                                                    <a href="/admin/pengguna/edit/{{$p->username}}" class="btn apptheme"><i class="fa fa-edit fa-lg"></i></a>
                                                    @if(session('username')!=$p->username)
                                                    <a href="/admin/pengguna/delete/{{$p->username}}" class="btn apptheme-danger"><i class="fa fa-trash fa-lg"></i></a>
                                                    @else
                                                    <a href="/admin/pengguna/delete/{{$p->username}}" class="btn apptheme-danger disabled"><i class="fa fa-trash fa-lg"></i></a>
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