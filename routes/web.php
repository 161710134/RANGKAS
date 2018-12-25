<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin']],
function (){
	Route::resource('/barang', 'BarangController');
	Route::resource('/anggota', 'AnggotaController');
	Route::resource('/peminjaman', 'PeminjamanController');
	Route::resource('/pengembalian', 'PengembalianController');
	Route::get('export/barang', [ 'as' => 'export.barang', 'uses' => 'BarangController@export' ]); 
Route::post('export/barang', [ 'as' => 'export.barang.post', 'uses' => 'BarangController@exportPost' ]);
	Route::get('export/pengembalian', [ 'as' => 'export.pengembalian', 'uses' => 'PengembalianController@export' ]);
	Route::post('export/pengembalian', [ 'as' => 'export.pengembalian.post', 'uses' => 'PengembalianController@exportPost' ]);

//laporan perbulan

//Anggota
Route::get('laporan/anggota', 'LaporanAnggota@index');
Route::post('laporan/anggota/detail', 'LaporanAnggota@index1');
Route::post('laporan/anggota/detail1', 'LaporanAnggota@index2');

//Barang
Route::get('laporan/barang', 'LaporanBarang@index');
Route::post('laporan/barang/detail', 'LaporanBarang@index1');
Route::post('laporan/barang/detail1', 'LaporanBarang@index2');

//Peminjaman
Route::get('laporan/peminjaman', 'LaporanPeminjaman@index');
Route::post('laporan/peminjaman/detail', 'LaporanPeminjaman@index1');
Route::post('laporan/peminjaman/detail1', 'LaporanPeminjaman@index2');

//Pengembalian
Route::get('laporan/pengembalian', 'LaporanPengembalian@index');
Route::post('laporan/pengembalian/detail', 'LaporanPengembalian@index1');
Route::post('laporan/pengembalian/detail1', 'LaporanPengembalian@index2');
});
       

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
