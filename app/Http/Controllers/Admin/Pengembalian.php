<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pengembalian extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $pengembalian = DB::table('tb_pemakaian')->select('tb_pemakaian.*', 'tb_barang.*', 'tb_karyawan.*', 'tb_pemakaian.status as pk_status', 'tb_pemakaian.keterangan as pk_keterangan')->join('tb_barang', 'tb_pemakaian.kd_barang', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', 'tb_karyawan.kd_karyawan')->where('tb_pemakaian.status', 'dikembalikan')->get();
        return view('admin/pengembalian/index', compact('pengembalian'));
    }

    public function add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        return view('admin/pengembalian/add');
    }

    public function p_add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $update = DB::table('tb_pemakaian')->where('no_pemakaian', '=', $req->no_pemakaian)->update(['tgl_pengembalian' => date('Y-m-d'), 'status' => 'dikembalikan']);
        if ($update) {
            return redirect('/admin/pengembalian')->with('success', 'Barang dikembalikan!');
        } else {
            return redirect('/admin/pengembalian')->with('failed', 'Barang gagal dikembalikan!');
        }
    }
}
