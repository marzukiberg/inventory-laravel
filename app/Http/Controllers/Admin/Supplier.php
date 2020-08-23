<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Supplier extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $supplier = DB::table('tb_supplier')->get();
        return view('admin/supplier/index', compact('supplier'));
    }

    public function add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        return view('admin/supplier/add');
    }

    public function p_add(Request $req)
    {
        if (!$req->session()->has('role')) {
            return redirect('/');
        }
        $insert = DB::table('tb_supplier')->insert([
            'kd_supplier' => $req->kd_supplier,
            'nm_supplier' => $req->nm_supplier,
            'alamat' => $req->alamat ? $req->alamat : '',
            'telp' => $req->telp ? $req->telp : '',
            'email' => $req->email ? $req->email : '',
        ]);

        if ($insert) {
            return redirect('admin/supplier')->with('success', 'Data supplier berhasil ditambahkan');
        } else {
            return redirect('admin/supplier')->with('failed', 'Data supplier gagal ditambahkan');
        }
    }

    public function edit($kd_supplier)
    {
        $supplier = DB::table('tb_supplier')->where("kd_supplier", $kd_supplier)->first();

        return view('admin/supplier/edit', ['sp' => $supplier]);
    }

    public function p_edit(Request $req)
    {
        $update = DB::table('tb_supplier')->where('kd_supplier', $req->kd_supplier)->update([
            'nm_supplier' => $req->nm_supplier,
            'alamat' => $req->alamat ? $req->alamat : '',
            'telp' => $req->telp ? $req->telp : '',
            'email' => $req->email ? $req->email : '',
        ]);

        if ($update > 0) {
            return redirect('/admin/supplier')->with('success', 'Data supplier berhasil diperbarui!');
        } elseif ($update < 0) {
            return redirect('/admin/supplier')->with('failed', 'Data supplier gagal diperbarui!');
        } else {
            return redirect('/admin/supplier');
        }
    }
}
