<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;

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
    return view('landing');
});

 // landing page
Route::get('/daftar_buku',[LandingController::class,'daftarbuku'])->name('daftarbuku');

// login register
Route::get('/loginn',[LoginController::class,'login'])->name('login');

