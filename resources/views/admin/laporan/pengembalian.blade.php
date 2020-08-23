@extends('admin/layout/header')
@section('title', 'Laporan Pengembalian Barang')

@include('admin/layout/sidebar')
<!-- top navigation -->
@include('admin/layout/topnav')
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cetak @yield('title')</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cetak @yield('title')</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <p class="text-muted font-13 m-b-30">
                                        Cetak laporan pemakaian pertanggal, perbarang, atau karyawan.
                                    </p>

                                    <form action="/admin/laporan/cetak_pengembalian" method="post" target="_blank">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="filter">Pilih Filter</label>
                                                <select name="filter" id="filter" class="form-control" required>
                                                    <option value="">-- PILIH FILTER --</option>
                                                    <option value="tanggal">Per Tanggal</option>
                                                    <option value="barang">Per Barang</option>
                                                    <option value="karyawan">Per Karyawan</option>
                                                </select>
                                            </div>
                                            <div id="dynamic_filter" class="d-block">
                                            </div>
                                            <div class="form-group col-12">
                                                <button class="btn btn-success" type="submit"><i class="fa fa-print"></i>
                                                    Cetak</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const filterSelect = document.querySelector('#filter')
    const dnFilter = document.querySelector('#dynamic_filter')

    filterSelect.addEventListener('change', function() {
        const filterValue = this.value;

        if (filterValue === 'tanggal') {
            dnFilter.innerHTML = `
                <div class="form-group col">
                    <label for="tgl_mulai">Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control" required />
                </div>
                <div class="form-group col">
                    <label for="tgl_akhir">Akhir</label>
                    <input type="date" name="tgl_akhir" class="form-control" required />
                </div>
            `
        } else if (filterValue === 'karyawan') {
            dnFilter.innerHTML = `
                <div class="form-group col">
                    <label for="kd_karyawan">Karyawan</label>
                    <select name="kd_karyawan" id="kd_karyawan" class="form-control" required>
                        <option value="">-- PILIH KARYAWAN --</option>
                        <?php
                        $karyawan = DB::table('tb_karyawan')->get();
                        foreach ($karyawan as $k) :
                        ?>
                        <option value="<?= $k->kd_karyawan ?>"><?= $k->kd_karyawan ?> - <?= $k->nm_karyawan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            `
        } else if (filterValue === 'barang') {
            dnFilter.innerHTML = `
                <div class="form-group col">
                    <label for="kd_barang">Karyawan</label>
                    <select name="kd_barang" id="kd_barang" class="form-control" required>
                        <option value="">-- PILIH BARANG --</option>
                        <?php
                        $barang = DB::table('tb_barang')->get();
                        foreach ($barang as $b) :
                        ?>
                        <option value="<?= $b->kd_barang ?>"><?= $b->kd_barang ?> - <?= $b->nm_barang ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            `;
        }
    })
</script>
<!-- /page content -->
@extends('admin/layout/footer')