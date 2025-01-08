<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardUserController;

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

Route::resource('/product', ProdukController::class);

Route::get('/transaksi', [TransaksiController::class, 'index'])->name("transaksi.index")->middleware('auth');
Route::post('/transaksi/tambah', [TransaksiController::class, 'tambah'])->name("transaksi.tambah")->middleware('auth');
Route::get('/transaksi/selesai', [TransaksiController::class, 'selesai'])->name("transaksi.selesai")->middleware('auth');
Route::get('/transaksi/hapus/{id}', [TransaksiController::class, 'hapus'])->name("transaksi.hapus")->middleware('auth');
