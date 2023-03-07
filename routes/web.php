<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index']);

Route::get('/paket', [App\Http\Controllers\PaketController::class, 'index']);

Route::get('/management/user', [App\Http\Controllers\UserManagementController::class, 'index']);

Route::get('/registrasi/pelanggan', [PelangganController::class, 'index']);
Route::get('read', [PelangganController::class, 'read']);
Route::get('create', [PelangganController::class, 'create']);
Route::post('store', [PelangganController::class, 'store']);
Route::get('edit/{id}', [PelangganController::class, 'edit']);
Route::put('update/{id}', [PelangganController::class, 'update']);
Route::delete('destroy/{id}', [PelangganController::class, 'destroy']);

Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index']);

Route::get('/outlet', [App\Http\Controllers\OutletController::class, 'index']);
Route::ApiResource('api/outlet', App\Http\Controllers\Api\OutletController::class);


// Route::get('/', function () {
//     return view('welcome');
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