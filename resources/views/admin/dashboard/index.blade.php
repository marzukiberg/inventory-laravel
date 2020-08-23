@extends('admin/layout/header')
@section('title', 'Dashboard Admin')

@include('admin/layout/sidebar')
<!-- top navigation -->
@include('admin/layout/topnav')
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row" style="display: inline-block;">
    <div class="tile_count">
      @if(session('role')!=='manager')
      <div class="col-md-2 col-sm-4  tile_stats_count p-3">
        <span class="count_top"><i class="fa fa-cubes"></i> Barang</span>
        <?php
        $total_barang = DB::table('tb_barang')->count();
        ?>
        <div class="count">{{ $total_barang }}</div>
        <a href="/admin/barang" class="btn btn-sm btn-block text-primary">Lihat lebih</a>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count p-3">
        <span class="count_top"><i class="fa fa-truck"></i> Supplier</span>
        <?php
        $total_supplier = DB::table('tb_supplier')->count();
        ?>
        <div class="count">{{$total_supplier}}</div>
        <a href="/admin/supplier" class="btn btn-sm btn-block text-primary">Lihat lebih</a>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count p-3">
        <span class="count_top"><i class="fa fa-users-cog"></i> Karyawan</span>
        <?php
        $total_karyawan = DB::table('tb_karyawan')->count();
        ?>
        <div class="count">{{$total_karyawan}}</div>
        <a href="/admin/supplier" class="btn btn-sm btn-block text-primary">Lihat lebih</a>
      </div>
      @endif
      <div class="col-md-2 col-sm-6  tile_stats_count p-3">
        <span class="count_top"><i class="fa fa-shopping-cart"></i> Transaksi Pemakaian</span>
        <?php
        $total_pemakaian = DB::table('tb_pemakaian')->where('status', '!=', 'dikembalikan')->count();
        ?>
        <div class="count">{{$total_pemakaian}}</div>
        <a href="/admin/pemakaian" class="btn btn-sm btn-block text-primary">Lihat lebih</a>
      </div>
      <div class="col-md-2 col-sm-6  tile_stats_count p-3">
        <span class="count_top"><i class="fa fa-shopping-cart"></i> Transaksi Pengembalian</span>
        <?php
        $total_pengembalian = DB::table('tb_pemakaian')->where('status', '=', 'dikembalikan')->count();
        ?>
        <div class="count">{{$total_pengembalian}}</div>
        <a href="/admin/pengembalian" class="btn btn-sm btn-block text-primary">Lihat lebih</a>
      </div>
    </div>
  </div>

  <?php
  $cek_menunggu = DB::table('tb_pemakaian')->where('status', 'menunggu')->count();
  ?>
  @if($cek_menunggu>0)
  <div class="bg-info p-3 text-white">
    <h5>{{$cek_menunggu}} transaksi menunggu persetujuan.</h5>
  </div>
  @endif
  <!-- /top tiles -->
</div>
<!-- /page content -->
@extends('admin/layout/footer')