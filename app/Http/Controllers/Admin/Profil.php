<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class Profil extends Controller
{
    public function index(Request $req)
    {
        $user = DB::table('tb_pengguna')->where('username', '=', $req->session()->get('username'))->first();
        return view('admin/profil/index', compact('user'));
    }

    public function edit(Request $req)
    {
        $user = DB::table('tb_pengguna')->where('username', $req->session()->get('username'))->first();

        return view('admin/profil/edit', compact('user'));
    }

    public function p_edit(Request $req)
    {
        $id_pengguna = $req->id;
        $username = $req->username;

        $cek_username = DB::table('tb_pengguna')->where('username', $username)->where('id_pengguna', '!=', $id_pengguna)->get();

        if (count($cek_username) > 0) {
            return redirect('admin/profil/edit')->with('failed', 'Username sudah digunakan, jika ingin mengganti coba username lain!');
        }

        if ($req->passlama == null) {
            $update = DB::table('tb_pengguna')->where('id_pengguna', $id_pengguna)->update([
                'username' => $username
            ]);
            if ($update) {
                return redirect('/auth/logout')->with('success', 'Username baru saja diubah, silahkan login kembali');
            } elseif ($update < 0) {
                return redirect('admin/profil/edit')->with('failed', 'Username gagal diubah!');
            } else {
                return redirect('admin/profil/edit');
            }
        } else {
            $cek_password = DB::table('tb_pengguna')->where('id_pengguna', $id_pengguna)->first();

            $passlama = $req->passlama;

            if (password_verify($passlama, $cek_password->password)) {
                $passbaru = $req->passbaru;
                $passbaru1 = $req->passbaru1;

                if ($passbaru == '' || $passbaru == null) {
                    return redirect('admin/profil/edit')->with('failed')->with('failed', 'Harap mengisi inputan password baru!');
                }
                if ($passbaru != $passbaru1) {
                    return redirect('admin/profil/edit')->with('failed')->with('failed', 'Konfirmasi password baru tidak sama dengan password baru');
                }
                $update = DB::table('tb_pengguna')->where('id_pengguna', $id_pengguna)->update([
                    'username' => $username,
                    'password' => password_hash($passbaru1, PASSWORD_BCRYPT)
                ]);

                return redirect('admin/profil/edit')->with('success', 'Password berhasil diubah!');
            } else {
                return redirect('admin/profil/edit')->with('failed')->with('failed', 'Password salah');
            }
        }
    }
}
