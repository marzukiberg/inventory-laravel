<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth@index');
Route::post('/', 'Auth@masuk');
Route::get('/auth/daftar', 'Auth@daftar');
Route::post('/auth/daftar', 'Auth@store');
Route::get('/auth/logout', 'Auth@logout');

Route::get('/admin', 'Admin\Dashboard@index');

Route::get('/admin/karyawan', 'Admin\Karyawan@index');
Route::get('/admin/karyawan/add', 'Admin\Karyawan@add');
Route::post('/admin/karyawan/add', 'Admin\Karyawan@add');
Route::post('/admin/karyawan/adddiv', 'Admin\Karyawan@adddiv');
Route::get('/admin/karyawan/edit/{kode}', 'Admin\Karyawan@edit');
Route::post('/admin/karyawan/edit/{kode}', 'Admin\Karyawan@p_edit');
Route::get('/admin/karyawan/edit_divisi/{id}', 'Admin\Karyawan@editdiv');
Route::post('/admin/karyawan/edit_divisi/{id}', 'Admin\Karyawan@p_editdiv');

Route::get('/admin/supplier', 'Admin\Supplier@index');
Route::get('/admin/supplier/add', 'Admin\Supplier@add');
Route::post('/admin/supplier/add', 'Admin\Supplier@p_add');
Route::get('/admin/supplier/edit/{kd_supplier}', 'Admin\Supplier@edit');
Route::post('/admin/supplier/edit/{kd_supplier}', 'Admin\Supplier@p_edit');

Route::get('/admin/barang', 'Admin\Barang@index');
Route::get('/admin/barang/add', 'Admin\Barang@add');
Route::post('/admin/barang/add', 'Admin\Barang@p_add');
Route::get('/admin/barang/edit/{kd_barang}', 'Admin\Barang@edit');
Route::post('/admin/barang/edit/{kd_barang}', 'Admin\Barang@p_edit');

Route::get('/admin/kategori_barang', 'Admin\KategoriBarang@index');
Route::get('/admin/kategori_barang/add', 'Admin\KategoriBarang@add');
Route::post('/admin/kategori_barang/add', 'Admin\KategoriBarang@p_add');
Route::get('/admin/kategori_barang/edit/{kd_kategori}', 'Admin\KategoriBarang@edit');
Route::post('/admin/kategori_barang/edit/{kd_kategori}', 'Admin\KategoriBarang@p_edit');

Route::get('/admin/pemakaian', 'Admin\Pemakaian@index');
Route::get('/admin/pemakaian/add', 'Admin\Pemakaian@add');
Route::post('/admin/pemakaian/add', 'Admin\Pemakaian@p_add');
Route::get('/admin/pemakaian/edit/{no_pemakaian}', 'Admin\Pemakaian@edit');
Route::post('/admin/pemakaian/edit/{no_pemakaian}', 'Admin\Pemakaian@p_edit');
Route::get('/admin/pemakaian/delete/{id}', 'Admin\Pemakaian@delete');
Route::get('/admin/pemakaian/acc/{no_pemakaian}', 'Admin\Pemakaian@acc');
Route::get('/admin/pemakaian/cetak_ba/{no_pemakaian}', 'Admin\Pemakaian@cetak_ba');

Route::get('/admin/pengembalian', 'Admin\Pengembalian@index');
Route::get('/admin/pengembalian/add', 'Admin\Pengembalian@add');
Route::post('/admin/pengembalian/add', 'Admin\Pengembalian@p_add');

Route::get('/admin/profil', 'Admin\Profil@index');
Route::get('/admin/profil/edit', 'Admin\Profil@edit');
Route::post('/admin/profil/edit', 'Admin\Profil@p_edit');

Route::get('/admin/pengguna', 'Admin\Pengguna@index');
Route::get('/admin/pengguna/ubahpass/{username}', 'Admin\Pengguna@ubahpass');
Route::post('/admin/pengguna/ubahpass/{username}', 'Admin\Pengguna@p_ubahpass');
Route::get('/admin/pengguna/edit/{username}', 'Admin\Pengguna@edit');

Route::get('/admin/laporan/barang', 'Admin\Laporan@barang');
Route::post('/admin/laporan/cetak_barang', 'Admin\Laporan@cetak_barang');
Route::get('/admin/laporan/pemakaian', 'Admin\Laporan@pemakaian');
Route::post('/admin/laporan/cetak_pemakaian', 'Admin\Laporan@cetak_pemakaian');
Route::get('/admin/laporan/pengembalian', 'Admin\Laporan@pengembalian');
Route::post('/admin/laporan/cetak_pengembalian', 'Admin\Laporan@cetak_pengembalian');
