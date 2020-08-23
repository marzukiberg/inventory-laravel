@extends('admin/layout/header')
@section('title', 'Ubah Data Karyawan')

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
                                    <label for="kd_karyawan">Kode</label>
                                    <input type="text" class="form-control" name="kd_karyawan" id="kd_karyawan" value="<?= $karyawan->kd_karyawan ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="nm_karyawan">Nama</label>
                                    <input type="text" class="form-control" name="nm_karyawan" id="nm_karyawan" placeholder="Nama karyawan..." value="<?= $karyawan->nm_karyawan ?>" required />
                                </div>
                                <div class="form-group">
                                    <label for="divisi">Divisi</label>
                                    <select name="divisi" id="divisi" class="form-control" required>
                                        <option value="<?= $karyawan->id_divisi ?>"><?= $karyawan->nm_divisi ?></option>
                                        <?php

                                        use Illuminate\Support\Facades\DB;

                                        $divisi = DB::table('tb_divisi')->get();
                                        foreach ($divisi as $d) :
                                        ?>

                                            <option value="<?= $d->id_divisi ?>"><?= $d->nm_divisi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="" cols="30" rows="4" class="form-control" placeholder="Alamat...">{{$karyawan->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select type="text" class="form-control" name="status" required>
                                        <option value="<?= $karyawan->status ?>"><?= ucfirst($karyawan->status) ?></option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidakaktif">Tidak Aktif</option>
                                    </select>

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