<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});
Auth::routes();
//route barang
Route::get('/barang',[App\Http\Controllers\BarangController::class, 'getAllBarang'])->name('barang')->middleware('auth');
Route::get('/barang/masuk',[App\Http\Controllers\BarangController::class, 'barangMasuk'])->name('barangMasuk')->middleware('auth');
Route::post('/barang/masuk',[App\Http\Controllers\BarangController::class, 'store'])->name('storeBarang')->middleware('auth');
Route::get('/barang/keluar',[App\Http\Controllers\BarangController::class, 'barangKeluar'])->name('barangKeluar')->middleware('auth');
Route::get('/barang/keluarCancle/{id}',[App\Http\Controllers\BarangController::class, 'barangKeluarCancle'])->name('barangKeluarCancle')->middleware('auth');
Route::get('/barang/proses/${id}',[App\Http\Controllers\BarangController::class, 'barangProses'])->name('barangProses')->middleware('auth');
Route::post('/barang/proses',[App\Http\Controllers\BarangController::class, 'updateToMuat'])->name('updateToMuat')->middleware('auth');
Route::get('/barang/edit/${id}',[App\Http\Controllers\BarangController::class, 'barangUpdate'])->name('barangUpdate')->middleware('auth');
Route::get('/barang/detail/${id}',[App\Http\Controllers\BarangController::class, 'barangDetail'])->name('barangDetail')->middleware('auth');
Route::post('/barang/edit',[App\Http\Controllers\BarangController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/barang/destroy/${id}',[App\Http\Controllers\BarangController::class, 'destroy'])->name('barang.destroy')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//cetak surat jalan
Route::get('/suratjalan/{id}',[App\Http\Controllers\BarangController::class, 'suratjalan'])->name('suratJalan')->middleware('auth');
//route pembayaran
Route::get('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'pembayaran'])->name('pembayaran')->middleware('auth');
Route::get('/pembayaran/{id}', [App\Http\Controllers\PembayaranController::class, 'pembayaranDetail'])->name('pembayaranDetail')->middleware('auth');
Route::post('/pembayaran/update', [App\Http\Controllers\PembayaranController::class, 'update'])->name('pembayaran.update')->middleware('auth');
Route::get('/pembayaran/update/{id}', [App\Http\Controllers\PembayaranController::class, 'pembayaranUpdate'])->name('pembayaran.proses')->middleware('auth');
Route::get('/pembayaran/updatecancle/{id}', [App\Http\Controllers\PembayaranController::class, 'pembayaranUpdateCancle'])->name('pembayaran.updateCancle')->middleware('auth');

//user controller
Route::get('/user', [App\Http\Controllers\UserController::class, 'user'])->name('user')->middleware('auth');
Route::post('/user/changeAprrove/{id}', [App\Http\Controllers\UserController::class, 'approve'])->name('user.approve')->middleware('auth');
Route::post('/user/changeReject/{id}', [App\Http\Controllers\UserController::class, 'reject'])->name('user.reject')->middleware('auth');

//dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'getAllBarang'])->name('dashboard')->middleware('auth');

