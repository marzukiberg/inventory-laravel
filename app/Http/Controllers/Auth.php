<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    public function index(Request $req)
    {
        if (session()->has('role')) {
            return redirect('admin');
        }
        echo view('auth.index');
    }

    public function masuk(Request $req)
    {
        $cek = DB::table('tb_pengguna')->where('username', $req->post('username'))->first();
        $req->flash();

        if (!$cek) {
            return redirect('/')->with('err', 'Username tidak ditemukan');
        } else {
            if (password_verify($req->post('password'), $cek->password)) {
                $req->session()->put('role', $cek->role);
                $req->session()->put('username', $cek->username);
                return redirect('admin');
            } else {
                return redirect('/')->with('err', 'Password salah');
            }
        }
    }

    public function daftar()
    {
        return view('auth.daftar');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'username' => 'required|min:6',
            'password' => 'required|min:6',
            'password1' => 'required_with:password|same:password'
        ], [
            'required' => 'Bidang :ATTRIBUTE dibutuhkan',
            'min' => 'Minimal :min karakter',
            'same' => 'Password dan konfirmasi tidak sesuai',
            'confirmed' => 'Password dan konfirmasi tidak sesuai'
        ]);
        $req->flash();

        $username_check = DB::table('tb_pengguna')->where('username', $req->post('username'))->get();

        if (count($username_check) !== 0) {
            return redirect('auth/daftar')->with('err', 'Username sudah digunakan');
        } else {
            $newpass = password_hash($req->post('password'), PASSWORD_BCRYPT);

            DB::table('tb_pengguna')->insert([
                'id_pengguna' => null,
                'username' => $req->post('username'),
                'password' => $newpass,
                'role' => $req->post('role')
            ]);
            return redirect('auth/daftar')->with('success', 'Pendaftaran berhasil dilakukan!');
        }
    }

    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect('/');
    }
}
