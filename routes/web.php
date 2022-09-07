<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DaftarbukuController;
use App\Http\Controllers\PeminjamanController;

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

// Route::get('/', function () {
//     return view('landing');
// });

Route::get('/',[LandingController::class,'landing'])->name('landing');

 // landing page
Route::get('/daftar_buku',[LandingController::class,'daftarbuku'])->name('daftarbuku');

// login register
Route::get('/loginn',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/logined', [LoginController::class, 'logined'])->name('logined');
Route::get('/register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


//Menu Admin

Route::get('/beranda',[DaftarbukuController::class,'beranda'])->name('beranda');

// peminjaman
Route::get('/peminjaman',[PeminjamanController::class,'peminjaman'])->name('peminjaman');
Route::get('/tambahpeminjaman',[PeminjamanController::class,'tambahpeminjaman'])->name('tambahpeminjaman');
Route::post('/insert', [PeminjamanController::class, 'insert'])->name('insert');

// pengembalian
Route::get('/pengembalian',[PengembalianController::class,'pengembalian'])->name('pengembalian');