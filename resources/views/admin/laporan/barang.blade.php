@extends('admin/layout/header')
@section('title', 'Laporan Barang')

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
                                        Cetak laporan data barang perkategori, pertanggal, dll.
                                    </p>

                                    <form action="/admin/laporan/cetak_barang" method="post" target="_blank">
                                        @csrf
                                        <div class="form-row" style="width: 600px;">
                                            <div class="form-group col">
                                                <label for="filter">Filter</label>
                                                <select name="filter" id="filter" class="form-control" required>
                                                    <option value="">-- PILIH FILTER --</option>
                                                    <option value="kategori">KATEGORI</option>
                                                    <option value="status">STATUS</option>
                                                </select>
                                            </div>
                                            <div class="form-group col" id="dynamic_filter"></div>
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

        if (filterValue.toLowerCase() === 'kategori') {
            dnFilter.innerHTML = `
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="">-- PILIH KATEGORI --</option>
                <?php
                $kategori = DB::table('tb_kategori')->get();
                ?>
                @foreach ($kategori as $kt)
                <option value="{{ $kt->kd_kategori }}">{{ $kt->nm_kategori }}
                </option>
                @endforeach
            </select>
            `
        } else if (filterValue.toLowerCase() === 'status') {
            dnFilter.innerHTML = `
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">-- PILIH STATUS --</option>
                <option value="ada">ADA</option>
                <option value="dipakai">DIPAKAI</option>
            </select>
            `
        } else {
            dnFilter.innerHTML = ''
        }
    })
</script>
<!-- /page content -->
@extends('admin/layout/footer')