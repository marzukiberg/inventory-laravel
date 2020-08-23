<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pemakaian extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $pemakaian = DB::table('tb_pemakaian')->select('tb_pemakaian.*', 'tb_barang.*', 'tb_karyawan.*', 'tb_pemakaian.status as pk_status', 'tb_pemakaian.keterangan as pk_keterangan')->join('tb_barang', 'tb_pemakaian.kd_barang', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', 'tb_karyawan.kd_karyawan')->where('tb_pemakaian.status', '!=', 'dikembalikan')->get();
        return view('admin/pemakaian/index', compact('pemakaian'));
    }

    public function add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        return view('admin/pemakaian/add');
    }

    public function p_add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $insert = DB::table('tb_pemakaian')->insert([
            'no_pemakaian' => null,
            'kd_barang' => $req->kd_barang,
            'kd_karyawan' => $req->kd_karyawan,
            'tgl_pemakaian' => $req->tgl_pemakaian,
            'tgl_pengembalian' => $req->tgl_pemakaian,
            'status' => 'menunggu',
            'keterangan' => $req->keterangan,
        ]);

        if ($insert) {
            return redirect('/admin/pemakaian')->with('success', 'Data pemakaian ditambahkan! silahkan menunggu disetujui pimpinan!');
        } else {
            return redirect('/admin/pemakaian')->with('failed', 'Data gagal ditambahkan!');
        }
    }

    public function delete(Request $req, $id = null)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        if ($id == null) {
            return redirect('/admin/pemakaian');
        } else {
            $check = DB::table('tb_pemakaian')->where('no_pemakaian', '=', $id)->count();
            if ($check == 0) {
                return redirect('/admin/pemakaian')->with('failed', 'Data pemakaian tidak ditemukan!');
            } else {
                $delete = DB::table('tb_pemakaian')->where('no_pemakaian', '=', $id)->delete();
                if ($delete) {
                    return redirect('/admin/pemakaian')->with('success', 'Data berhasil dihapus!');
                } else {
                    return redirect('/admin/pemakaian')->with('failed', 'Data gagal dihapus!');
                }
            }
        }
    }

    public function edit($no_pemakaian)
    {
        if ($no_pemakaian == null) {
            return redirect('admin/pemakaian');
        }

        $pk = DB::table('tb_pemakaian')->select('tb_pemakaian.*', 'tb_barang.*', 'tb_karyawan.*', 'tb_pemakaian.keterangan as pk_keterangan', 'tb_pemakaian.keterangan as pk_keterangan')->join('tb_barang', 'tb_pemakaian.kd_barang', 'tb_barang.kd_barang')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', 'tb_karyawan.kd_karyawan')->where('no_pemakaian', $no_pemakaian)->first();

        return view('admin/pemakaian/edit', compact('pk'));
    }

    public function p_edit(Request $req)
    {
        $update = DB::table('tb_pemakaian')->where('no_pemakaian', $req->no_pemakaian)->update([
            'kd_barang' => $req->kd_barang,
            'kd_karyawan' => $req->kd_karyawan,
            'tgl_pemakaian' => $req->tgl_pemakaian,
            'keterangan' => $req->keterangan ? $req->keterangan : '',
        ]);

        if ($update) {
            return redirect('admin/pemakaian')->with('success', 'Pengajuan pemakaian diubah!');
        } elseif ($update < 0) {
            return redirect('admin/pemakaian')->with('failed', 'Pengajuan gagal diubah!');
        } else {
            return redirect('admin/pemakaian');
        }
    }

    public function acc($no_pemakaian = null)
    {
        if ($no_pemakaian == null) {
            return redirect('admin/pemakaian');
        }
        $update = DB::table('tb_pemakaian')->where('no_pemakaian', $no_pemakaian)->update([
            'status' => 'disetujui'
        ]);
        if ($update) {
            return redirect('admin/pemakaian')->with('success', 'Pengajuan pemakaian disetujui!');
        } else {
            return redirect('admin/pemakaian')->with('failed', 'Pengajuan gagal disetujui!');
        }
    }

    public function cetak_ba($no_pemakaian = null)
    {
        if ($no_pemakaian == null) {
            return redirect('admin/pemakaian');
        };
        $pk = DB::table('tb_pemakaian')->join('tb_karyawan', 'tb_pemakaian.kd_karyawan', '=', 'tb_karyawan.kd_karyawan')->where('no_pemakaian', $no_pemakaian)->first();

        $kd_barang = $pk->kd_barang;
        $barang = DB::table('tb_barang')->join('tb_kategori', 'tb_barang.kd_kategori', '=', 'tb_kategori.kd_kategori')->where('kd_barang', $kd_barang)->first();

        return view('admin/pemakaian/cetak_ba', ['pk' => $pk, 'barang' => $barang]);
    }
}
