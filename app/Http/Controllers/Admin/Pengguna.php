<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Pengguna extends Controller
{
    public function index()
    {
        if (!Session::has('role')) {
            return redirect('/')->with('message', 'Masuk dahulu');
        }
        $pengguna = DB::table('tb_pengguna')->get();
        return view('admin/pengguna/index', compact('pengguna'));
    }

    public function ubahpass(Request $req, $username)
    {
        if ($username != $req->session()->get('username')) {
            return redirect('/admin/pengguna')->with('failed', 'Anda hanya dapat mengubah data anda sendiri!');
        }

        return view('admin/pengguna/ubahpass');
    }

    public function p_ubahpass(Request $req)
    {
        $username = $req->session()->get('username');
        $passlama = $req->post('passlama');
        $passbaru = $req->post('passbaru');
        $passbaru2 = $req->post('passbaru2');

        $cek = DB::table('tb_pengguna')->where(
            'username',
            '=',
            $req->session()->get('username')
        )->first();

        if (!password_verify($passlama, $cek->password)) {
            return redirect('admin/pengguna/ubahpass/' . $username)->with('failed', 'Password lama tidak sesuai dengan sistem!');
        }

        if ($passbaru !== $passbaru2) {
            return redirect('admin/pengguna/ubahpass/' . $username)->with('failed', 'Password baru harus sama dengan konfirmasi!');
        }

        $passbaruhash = password_hash($passbaru, PASSWORD_BCRYPT);
        $update = DB::table('tb_pengguna')->where('username', $username)->update(['password' => $passbaruhash]);
        if ($update) {
            return redirect('/admin/pengguna/ubahpass/' . $username)->with('success', 'Password berhasil diubah!');
        } else {
            return redirect('/admin/pengguna/ubahpass/' . $username)->with('failed', 'Password gagal diubah!');
        }
    }

    public function edit($username)
    {
        $user = DB::table('tb_pengguna')->where('username', $username)->first();

        // return view('admin/pengguna/')
    }
}
