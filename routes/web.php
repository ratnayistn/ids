<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LocationController;
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
    return view('home');
});

Route::get('/customer', '\App\Http\Controllers\CustomerController@index');

Route::get('/customer/addcust1','App\Http\Controllers\CustomerController@list');
Route::post('/customer/create1','App\Http\Controllers\CustomerController@create');

Route::get('/customer/addcust2','App\Http\Controllers\CustomerController@list2');
Route::post('/customer/create2','App\Http\Controllers\CustomerController@create2');

Route::get('/findKota', 'App\Http\Controllers\CustomerController@findKota')->name('findKota');
Route::get('/findKecamatan', 'App\Http\Controllers\CustomerController@findKecamatan')->name('findKecamatan');
Route::get('/findKelurahan', 'App\Http\Controllers\CustomerController@findKelurahan')->name('findKelurahan');


Route::get('/barang', 'App\Http\Controllers\BarangController@indexBarang');

Route::get('/tambahbarang', 'App\Http\Controllers\BarangController@tambahbarang');
Route::POST('/barcode/simpan/', 'App\Http\Controllers\BarangController@simpan');
Route::get('/barang/printbarcode', 'App\Http\Controllers\BarangController@cetak_pdf');
Route::get('/scanbarcode', 'App\Http\Controllers\BarangController@scan_barcode');

Route::get('/lokasi_toko', [LocationController::class, 'index']);
Route::get('/tambahtoko', [LocationController::class, 'indexToko']);
Route::post('/tambahtoko/simpan', [LocationController::class, 'insertToko'])->name('insertToko');
Route::get('/scan_kunjungan', 'App\Http\Controllers\LocationController@scan_kunjungan');
Route::get('/findToko', 'App\Http\Controllers\LocationController@findToko')->name('findToko');