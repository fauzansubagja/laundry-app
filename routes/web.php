<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserManagementController;

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

Auth::routes();

Route::get('/', function () {
    return redirect(url('/login'));
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index']);

// route transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/read', [TransaksiController::class, 'read']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksi/store', [TransaksiController::class, 'store']);
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit']);
Route::put('/transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::delete('/transaksi/destroy/{id}', [TransaksiController::class, 'destroy']);
Route::get('/transaksi/get-price/{id}', [TransaksiController::class, 'getPaketPrice']);
Route::get('/transaksi/get-diskon/{kode}', [TransaksiController::class, 'getDiskon']);
// end route transaksi

// route pengguna
Route::get('/management/user', [UserManagementController::class, 'index']);
Route::get('/management/user/read', [UserManagementController::class, 'read']);
Route::get('/management/user/create', [UserManagementController::class, 'create']);
Route::post('/management/user/store', [UserManagementController::class, 'store']);
Route::get('/management/user/edit/{id}', [UserManagementController::class, 'edit']);
Route::put('/management/user/update/{id}', [UserManagementController::class, 'update']);
Route::delete('/management/user/destroy/{id}', [UserManagementController::class, 'destroy']);
Route::get('/profile/{id}', [UserManagementController::class, 'profile']);
// end route pengguna

// route paket
Route::get('/paket', [PaketController::class, 'index']);
Route::get('/paket/read', [PaketController::class, 'read']);
Route::get('/paket/create', [PaketController::class, 'create']);
Route::post('/paket/store', [PaketController::class, 'store']);
Route::get('/paket/edit/{id}', [PaketController::class, 'edit']);
Route::put('/paket/update/{id}', [PaketController::class, 'update']);
Route::delete('/paket/destroy/{id}', [PaketController::class, 'destroy']);
// end route paket

// route pelanggan
Route::get('/registrasi/pelanggan', [PelangganController::class, 'index']);
Route::get('/registrasi/pelanggan/read', [PelangganController::class, 'read']);
Route::get('/registrasi/pelanggan/create', [PelangganController::class, 'create']);
Route::post('/registrasi/pelanggan/store', [PelangganController::class, 'store']);
Route::get('/registrasi/pelanggan/edit/{id}', [PelangganController::class, 'edit']);
Route::put('/registrasi/pelanggan/update/{id}', [PelangganController::class, 'update']);
Route::delete('/pelanggan/destroy/{id}', [PelangganController::class, 'destroy']);
// end route pelanggan

// route outlet
Route::get('/outlet', [OutletController::class, 'index']);
Route::get('/outlet/read', [OutletController::class, 'read']);
Route::get('/outlet/create', [OutletController::class, 'create']);
Route::post('/outlet/store', [OutletController::class, 'store']);
Route::get('/outlet/edit/{id}', [OutletController::class, 'edit']);
Route::put('/outlet/update/{id}', [OutletController::class, 'update']);
Route::delete('/outlet/destroy/{id}', [OutletController::class, 'destroy']);
// end route outlet


Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index']);

// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });
// Route::get('/register', function () {
//     return view('auth.register');
// });
// Route::get('/1', function () {
//     return view('dashboard');
// });
// Route::get('/2', function () {
//     return view('admin.paket.index');
// });
// Route::get('/3', function () {
//     return view('admin.outlet.index');
// });
// Route::get('/4', function () {
//     return view('admin.pelanggan.index');
// });
// Route::get('/5', function () {
//     return view('admin.laporan.index');
// });
// Route::get('/6', function () {
//     return view('admin.transaksi.index');
// });
// Route::get('/7', function () {
//     return view('admin.pengguna.index');
// });