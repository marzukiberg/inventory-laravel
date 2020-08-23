<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Barang extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $barang = DB::table('tb_barang')->join('tb_kategori', 'tb_barang.kd_kategori', 'tb_kategori.kd_kategori')->join('tb_supplier', 'tb_barang.kd_supplier', 'tb_supplier.kd_supplier')->get();
        return view('admin/barang/index', compact('barang'));
    }

    public function add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        return view('admin/barang/add');
    }

    public function p_add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $insert = DB::table('tb_barang')->insert([
            'kd_barang' => $req->kd_barang,
            'kd_kategori' => $req->kd_kategori,
            'nm_barang' => $req->nm_barang,
            'tgl_beli' => $req->tgl_beli,
            'kd_supplier' => $req->kd_supplier,
            'merek' => $req->merek ? $req->merek : '',
            'tipe' => $req->tipe ? $req->tipe : '',
            'serial_number' => $req->serial_number ? $req->serial_number : '',
            'keterangan' => $req->keterangan ? $req->keterangan : '',
            'status' => $req->status,
        ]);

        if ($insert) {
            return redirect('/admin/barang')->with('success', 'Barang berhasil ditambahkan!');
        } else {
            return redirect('/admin/barang')->with('failed', 'Barang gagal ditambahkan!');
        }
    }

    public function edit($kd_barang = null)
    {
        $barang = DB::table('tb_barang')->join('tb_kategori', 'tb_barang.kd_kategori', '=', 'tb_kategori.kd_kategori')->join('tb_supplier', 'tb_barang.kd_supplier', '=', 'tb_supplier.kd_supplier')->where('kd_barang', $kd_barang)->first();

        return view('admin/barang/edit', compact('barang'));
    }

    public function p_edit(Request $req)
    {
        $update = DB::table('tb_barang')->where('kd_barang', $req->kd_barang)->update([
            'kd_kategori' => $req->kd_kategori,
            'nm_barang' => $req->nm_barang,
            'tgl_beli' => $req->tgl_beli,
            'kd_supplier' => $req->kd_supplier,
            'merek' => $req->merek ? $req->merek : '',
            'tipe' => $req->tipe ? $req->tipe : '',
            'serial_number' => $req->serial_number ? $req->serial_number : '',
            'keterangan' => $req->keterangan ? $req->keterangan : '',
            'status' => $req->status,
        ]);

        if ($update > 0) {
            return redirect('admin/barang')->with('success', 'Data barang diperbarui!');
        } elseif ($update < 0) {
            return redirect('admin/barang')->with('success', 'Data barang diperbarui!');
        } else {
            return redirect('admin/barang');
        }
    }
}
