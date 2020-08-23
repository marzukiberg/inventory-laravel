<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriBarang extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $kategori_barang = DB::table('tb_kategori')->get();
        return view('admin/kategori_barang/index', compact('kategori_barang'));
    }

    public function add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        return view('admin/kategori_barang/add');
    }

    public function p_add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $insert = DB::table('tb_kategori')->insert([
            'kd_kategori' => $req->kd_kategori,
            'nm_kategori' => $req->nm_kategori,
        ]);

        if ($insert) {
            return redirect('/admin/kategori_barang')->with('success', 'Kategori baru berhasil ditambahkan!');
        } else {
            return redirect('/admin/kategori_barang')->with('failed', 'Kategori gagal ditambahkan!');
        }
    }

    public function edit($kd_kategori)
    {
        $kategori = DB::table('tb_kategori')->where('kd_kategori', $kd_kategori)->first();

        return view('admin/kategori_barang/edit', ['kt' => $kategori]);
    }

    public function p_edit(Request $req)
    {
        $update = DB::table('tb_kategori')->where('kd_kategori', $req->kd_kategori)->update([
            'nm_kategori' => $req->nm_kategori ? $req->nm_kategori : ''
        ]);

        if ($update) {
            return redirect('admin/kategori_barang')->with('success', 'Kategori berhasil diperbarui!');
        } elseif ($update < 0) {
            return redirect('admin/kategori_barang')->with('failed', 'Kategori gagal diperbarui!');
        } else {
            return redirect('admin/kategori_barang');
        }
    }
}
