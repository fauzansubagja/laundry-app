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
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/1', function () {
    return view('dashboard');
});
Route::get('/2', function () {
    return view('admin.paket.index');
});
Route::get('/3', function () {
    return view('admin.outlet.index');
});
Route::get('/4', function () {
    return view('admin.pelanggan.index');
});
Route::get('/5', function () {
    return view('admin.laporan.index');
});
Route::get('/6', function () {
    return view('admin.transaksi.index');
});
Route::get('/7', function () {
    return view('admin.pengguna.index');
});