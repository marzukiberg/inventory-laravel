<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Karyawan extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $karyawan = DB::table('tb_karyawan')->join('tb_divisi', 'tb_karyawan.id_divisi', 'tb_divisi.id_divisi')->get();
        $divisi = DB::table('tb_divisi')->get();
        return view('admin/karyawan/index', compact('karyawan', 'divisi'));
    }

    public function add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        if (!empty($req->nm_karyawan)) {
            $insert = DB::table('tb_karyawan')->insert([
                'kd_karyawan' => $req->kd_karyawan,
                'nm_karyawan' => $req->nm_karyawan,
                'id_divisi' => $req->divisi,
                'alamat' => $req->alamat,
                'status' => $req->status
            ]);
            if ($insert) {
                return redirect('admin/karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
            } else {
                return redirect('admin/karyawan')->with('failed', 'Data gagal ditambahkan');
            }
        } else {
            return view('admin/karyawan/add');
        }
    }

    public function adddiv(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $nm_divisi = ucfirst($req->nm_divisi);
        $cek = DB::table('tb_divisi')->where('nm_divisi', 'like', $nm_divisi)->get();

        if ($cek->count() == 0) {
            DB::table('tb_divisi')->insert([
                'id_divisi' => null,
                'nm_divisi' => $req->nm_divisi
            ]);
            return redirect('admin/karyawan')->with('divsuccess', 'Divisi baru berhasil ditambahkan');
        } else {
            return redirect('admin/karyawan')->with('divfailed', 'Divisi sudah ada');
        }
    }

    public function edit(Request $req, $kd_karyawan)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $karyawan = DB::table('tb_karyawan')->join('tb_divisi', 'tb_karyawan.id_divisi', '=', 'tb_divisi.id_divisi')->where('kd_karyawan', '=', $kd_karyawan)->first();
        return view('admin/karyawan/edit', compact('karyawan'));
    }

    public function p_edit(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $update = DB::table('tb_karyawan')->where('kd_karyawan', $req->kd_karyawan)->update([
            'nm_karyawan' => $req->nm_karyawan,
            'id_divisi' => $req->divisi,
            'alamat' => $req->alamat,
            'status' => $req->status,
        ]);
        if ($update) {
            return redirect('/admin/karyawan')->with(
                'success',
                'Karyawan ' . $req->kd_karyawan . ' berhasil diperbarui'
            );
        } else {
            return redirect('/admin/karyawan')->with('failed', 'Data karyawan gagal diperbarui!');
        }
    }

    public function editdiv($id = null)
    {
        if ($id == null) {
            return redirect('/admin/karyawan');
        }
        $divisi = DB::table('tb_divisi')->where('id_divisi', $id)->first();
        return view('admin/karyawan/edit_divisi', compact('divisi'));
    }

    public function p_editdiv(Request $req)
    {
        $update = DB::table('tb_divisi')->where('id_divisi', '=', $req->id_divisi)->update([
            'nm_divisi' => $req->nm_divisi
        ]);

        if ($update) {
            return redirect('/admin/karyawan')->with('divsuccess', 'Divisi berhasil diperbarui!');
        } else {
            return redirect('/admin/karyawan')->with('divfailed', 'Divisi gagal diperbarui!');
        }
    }
}
