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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route barang
Route::get('/barang','BarangController@index')->name('barangindex');
Route::get('/barang/create','BarangController@create')->name('barangcreate');
Route::post('/barang/store','BarangController@store')->name('barangstore');
Route::get('/barang/edit/{id}','BarangController@edit')->name('barangedit');
Route::put('/barang/update/{id}','BarangController@update')->name('barangupdate');
Route::delete('/barang/delete/{id}','BarangController@destroy')->name('barangdelete');

//route kategori
Route::get('/kategori','KategoriController@index')->name('kategoriindex');
Route::get('/kategori/create','KategoriController@create')->name('kategoricreate');
Route::post('/kategori/store','KategoriController@store')->name('kategoristore');
Route::get('/kategori/edit/{id}','KategoriController@edit')->name('kategoriedit');
Route::put('/kategori/update/{id}','KategoriController@update')->name('kategoriupdate');
Route::delete('/kategori/delete/{id}','KategoriController@destroy')->name('kategoridelete');

//Route Suplier
Route::get('/suplier','SuplierController@index')->name('suplierindex');
Route::get('/suplier/create','SuplierController@create')->name('supliercreate');
Route::post('/suplier/store','SuplierController@store')->name('suplierstore');
Route::get('/suplier/edit/{id}','SuplierController@edit')->name('suplieredit');
Route::put('/suplier/update/{id}','SuplierController@update')->name('suplierupdate');
Route::delete('/suplier/delete/{id}','SuplierController@destroy')->name('suplierdelete');

//route pelanggan
Route::get('/pelanggan','PelangganController@index')->name('pelangganindex');
Route::get('/pelanggan/create','PelangganController@create')->name('pelanggancreate');
Route::post('/pelanggan/store','PelangganController@store')->name('pelangganstore');
Route::get('/pelanggan/edit/{id}','PelangganController@edit')->name('pelangganedit');
Route::put('/pelanggan/update/{id}','PelangganController@update')->name('pelangganupdate');
Route::delete('/pelanggan/delete/{id}','PelangganController@destroy')->name('pelanggandelete');

//Route Penjualan
Route::get('/penjualan','PenjualanController@index')->name('penjualanindex');
Route::get('/penjualan/barang','PenjualanController@barang')->name('databarang');
Route::get('/penjualan/search/{name}','PenjualanController@search')->name('penjualansearch');
Route::post('/penjualan/store','PenjualanController@store')->name('penjualanstore');
Route::get('/test','PenjualanController@test');
Route::delete('/penjualan/delete/{id}','PenjualanController@destroy')->name('penjualdelete');

//Route Pembelian
Route::get('/pembelian','PembelianController@index')->name('pembelianindex');
Route::post('/pembelian/store','PembelianController@store')->name('pembelianstore');

//cetak pdf kwitansi penjualan
Route::get('/laporan/print/','LaporanController@index')->name('cetak');

//Route Pegawai
Route::get('/pegawai','PegawaiController@index')->name('pegawaiindex');
Route::post('/pegawai/store','PegawaiController@store')->name('pegawaistore');

//Route Laporan
Route::get('/laporan/penjualan','LaporanController@laporanpenjualanindex')->name('laporanpenjualanindex');
Route::get('/laporan/penjualan/semua','LaporanController@laporanpenjualansemua')->name('laporanpenjualansemua');
Route::get('/laporan/penjualan/invoice/{id}','LaporanController@invoice')->name('laporanpenjualaninvoice');
Route::get('/laporan/penjualan/invoice/pdf/{id}','LaporanController@invoicepdf')->name('laporanpenjualaninvoicepdf');
Route::get('/laporan/penjualan/{tglawal}/{tglakhir}','LaporanController@laporanpenjualanindexrange')->name('test');

Route::get('/laporan/pembelian','LaporanController@laporanpembelianindex')->name('laporanpembelianindex');
Route::get('/laporan/terima/{id}','LaporanController@terimaBarang')->name('terimabarang');
Route::get('/laporan/invoice/pembelian/{id}','LaporanController@invoicepembelian')->name('invoicepembelian');