<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::resource('/dashboard/user', DashboardMahasiswaController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/user', DashboardUserController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/barang', DataBarangController::class)->except('show')->middleware('auth');
// Route::resource('/dashboard/laporan', LaporanController::class)->except('show')->middleware('auth');
Route::get('/laporan', [LaporanController::class, 'index'])->name('index');
Route::get('/laporann', [LaporanController::class, 'laporann'])->name('laporann');

Route::resource('/dashboard/transaksi', TransaksiController::class)->except('show')->middleware('auth');