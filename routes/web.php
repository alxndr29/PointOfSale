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

//Route Penjualan
Route::get('/penjualan','PenjualanController@index')->name('penjualanindex');