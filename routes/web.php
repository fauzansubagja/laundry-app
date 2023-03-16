<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\LaporanController;
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
Route::get('/coba', function () {
    return view('coba');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index']);

// route pelanggan
// end route pelanggan

// route transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/read', [TransaksiController::class, 'read']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksi/store', [TransaksiController::class, 'store']);
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit']);
Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detail']);
Route::put('/transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::delete('/transaksi/destroy/{id}', [TransaksiController::class, 'destroy']);
// Route::post('/transaksi/get-price/{id}', [TransaksiController::class, 'getPaketPrice']);
Route::post('/transaksi/get-price', [TransaksiController::class, 'getPaketPrice']);
// Route::get('/transaksi/get-paket-options', [TransaksiController::class, 'getPaketOption']);
Route::get('/transaksi/get-diskon/{kode}', [TransaksiController::class, 'getDiskon']);
Route::get('/pesanan', [MemberController::class, 'index']);
// end route transaksi

// route registrasi pelanggan
Route::get('/registrasi/pelanggan', [PelangganController::class, 'index']);
Route::get('/registrasi/pelanggan/read', [PelangganController::class, 'read']);
Route::get('/registrasi/pelanggan/create', [PelangganController::class, 'create']);
Route::post('/registrasi/pelanggan/store', [PelangganController::class, 'store']);
Route::get('/registrasi/pelanggan/edit/{id}', [PelangganController::class, 'edit']);
Route::put('/registrasi/pelanggan/update/{id}', [PelangganController::class, 'update']);
Route::delete('/pelanggan/destroy/{id}', [PelangganController::class, 'destroy']);
// end route registrasi pelanggan

Route::middleware(['auth', 'checkRole:Admin,Owner'])->group(function () {
    // route paket
    Route::get('/paket', [PaketController::class, 'index']);
    Route::get('/paket/read', [PaketController::class, 'read']);
    Route::get('/paket/create', [PaketController::class, 'create']);
    Route::post('/paket/store', [PaketController::class, 'store']);
    Route::get('/paket/edit/{id}', [PaketController::class, 'edit']);
    Route::put('/paket/update/{id}', [PaketController::class, 'update']);
    Route::delete('/paket/destroy/{id}', [PaketController::class, 'destroy']);
    // end route paket

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

    // route outlet
    Route::get('/outlet', [OutletController::class, 'index']);
    Route::get('/outlet/read', [OutletController::class, 'read']);
    Route::get('/outlet/create', [OutletController::class, 'create']);
    Route::post('/outlet/store', [OutletController::class, 'store']);
    Route::get('/outlet/edit/{id}', [OutletController::class, 'edit']);
    Route::put('/outlet/update/{id}', [OutletController::class, 'update']);
    Route::delete('/outlet/destroy/{id}', [OutletController::class, 'destroy']);
    // end route outlet
});

Route::put('/pelanggan/{id}/status', [LaporanController::class, 'updateStatus']);
Route::delete('/delete-view/{id}', [App\Http\Controllers\LaporanController::class, 'deleteView']);
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index']);
Route::get('/laporan/export', [App\Http\Controllers\LaporanController::class, 'export'])->name('laporan.export');
