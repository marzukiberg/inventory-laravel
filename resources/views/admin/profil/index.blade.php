@extends('admin/layout/header')
@section('title', 'Profil Saya')

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

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>@yield('title')</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Perbarui profil kamu melalui menu ini.
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

                                    <div style="max-width: 540px;" class="d-block mx-auto text-center">
                                        <img src="{{asset('gentelella/production/images/user.png')}}" alt="User Image" class="rounded-circle img-fluid">
                                        <h2><b>{{strtoupper($user->username)}}</b></h2>
                                        <h2>{{strtoupper($user->role)}}</h2>
                                        <a href="/admin/profil/edit" class="btn apptheme px-5">Ubah Profil</a>
                                    </div>
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