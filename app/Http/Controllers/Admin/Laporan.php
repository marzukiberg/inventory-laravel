<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Laporan extends Controller
{
    public function barang(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $barang = DB::table('tb_barang')->join('tb_kategori', 'tb_barang.kd_kategori', 'tb_kategori.kd_kategori')->join('tb_supplier', 'tb_barang.kd_supplier', 'tb_supplier.kd_supplier')->get();
        return view('admin/laporan/barang', compact('barang'));
    }

    public function cetak_barang(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        if ($req->filter == 'kategori') {
            $kategori = DB::table('tb_barang')->join('tb_kategori', 'tb_barang.kd_kategori', '=', 'tb_kategori.kd_kategori')->join('tb_supplier', 'tb_barang.kd_supplier', '=', 'tb_barang.kd_supplier')->where('tb_barang.kd_kategori', $req->kategori)->get();

            return view('admin/laporan/cetak_barang', ['barang' => $kategori]);
        } elseif ($req->filter == 'status') {
            $status = DB::table('tb_barang')->join('tb_kategori', 'tb_barang.kd_kategori', '=', 'tb_kategori.kd_kategori')->join('tb_supplier', 'tb_barang.kd_supplier', '=', 'tb_barang.kd_supplier')->where('tb_barang.status', $req->status)->get();

            return view('admin/laporan/cetak_barang', ['barang' => $status]);
        }
    }

    public function pemakaian(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        return view('admin.laporan.pemakaian');
    }

    public function cetak_pemakaian(Request $req)
    {
        if ($req->filter == 'tanggal') {
            $pemakaian = DB::table('tb_pemakaian')->join("tb_barang", 'tb_pemakaian.kd_barang', '=', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', '=', 'tb_karyawan.kd_karyawan')->whereBetween('tgl_pemakaian', [$req->tgl_mulai, $req->tgl_akhir])->get();

            return view('admin/laporan/cetak_pemakaian', compact('pemakaian'));
        } elseif ($req->filter == 'barang') {
            $pemakaian = DB::table('tb_pemakaian')->join("tb_barang", 'tb_pemakaian.kd_barang', '=', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', '=', 'tb_karyawan.kd_karyawan')->where('tb_pemakaian.kd_barang', '=', $req->kd_barang)->get();

            return view('admin/laporan/cetak_pemakaian', compact('pemakaian'));
        } elseif ($req->filter == 'karyawan') {
            $pemakaian = DB::table('tb_pemakaian')->join("tb_barang", 'tb_pemakaian.kd_barang', '=', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', '=', 'tb_karyawan.kd_karyawan')->where('tb_pemakaian.kd_karyawan', '=', $req->kd_karyawan)->get();

            return view('admin/laporan/cetak_pemakaian', compact('pemakaian'));
        }
    }

    public function pengembalian(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        return view('admin.laporan.pengembalian');
    }

    public function cetak_pengembalian(Request $req)
    {
        if ($req->filter == 'tanggal') {
            $pengembalian = DB::table('tb_pemakaian')->join("tb_barang", 'tb_pemakaian.kd_barang', '=', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', '=', 'tb_karyawan.kd_karyawan')->whereBetween('tgl_pengembalian', [$req->tgl_mulai, $req->tgl_akhir])->where('tb_pemakaian.status', '=', 'dikembalikan')->get();

            return view('admin/laporan/cetak_pengembalian', compact('pengembalian'));
        } elseif ($req->filter == 'barang') {
            $pengembalian = DB::table('tb_pemakaian')->join("tb_barang", 'tb_pemakaian.kd_barang', '=', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', '=', 'tb_karyawan.kd_karyawan')->where('tb_pemakaian.kd_barang', '=', $req->kd_barang)->where('tb_pemakaian.status', '=', 'dikembalikan')->get();

            return view('admin/laporan/cetak_pengembalian', compact('pengembalian'));
        } elseif ($req->filter == 'karyawan') {
            $pengembalian = DB::table('tb_pemakaian')->join("tb_barang", 'tb_pemakaian.kd_barang', '=', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', '=', 'tb_karyawan.kd_karyawan')->where('tb_pemakaian.kd_karyawan', '=', $req->kd_karyawan)->where('tb_pemakaian.status', '=', 'dikembalikan')->get();

            return view('admin/laporan/cetak_pengembalian', compact('pengembalian'));
        }
    }
}
