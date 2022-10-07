<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DaftarbukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DaftarAnggotaController;

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

Route::get('/beranda', function () {
    return view('beranda');
});
// Route::get('/idcard', function () {
//     return view('anggota.idcard');
// });
Route::get('/tes', function () {
    return view('tes');
});

Route::get('/profile', function () {
    return view('profile.profile');
});
Route::get('/profile/edit', function () {
    return view('profile.editprofile');
});
Route::get('/profile/gantipassword', function () {
    return view('profile.gantipassword');
});

Route::get('/',[LandingController::class,'landing'])->name('landing');

 // landing page
Route::get('/daftar_buku',[LandingController::class,'daftarbuku'])->name('daftarbuku');

// login register
Route::get('/login',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/logined', [LoginController::class, 'logined'])->name('logined');
Route::post('/editfoto', [LoginController::class, 'editfoto'])->name('editfoto');
Route::post('/editprofile', [LoginController::class, 'editprofile'])->name('editprofile');
Route::post('/editpassword', [LoginController::class, 'editpassword'])->name('editpassword');
Route::get('/register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//Menu Admin

// Route::get('/beranda',[DaftarbukuController::class,'beranda'])->name('beranda');

Route::group(['middleware' => ['auth', 'Cekrole:admin,petugas']], function(){

// buku
Route::get('/buku',[DaftarbukuController::class,'buku'])->name('buku');
Route::get('/tambahbuku',[DaftarbukuController::class,'tambahbuku'])->name('tambahbuku');
Route::post('/tambahbukupost',[DaftarbukuController::class,'tambahbukupost'])->name('tambahbukupost');
Route::get('/editbuku/{id}',[DaftarbukuController::class,'editbuku'])->name('editbuku');
Route::post('/editbukupost/{id}',[DaftarbukuController::class,'editbukupost'])->name('editbukupost');
Route::post('/cetakbarcode',[DaftarbukuController::class,'cetakbarcode'])->name('cetakbarcode');
Route::get('/deletebuku/{id}',[DaftarbukuController::class,'deletebuku'])->name('deletebuku');

// kategori
Route::get('/kategori',[KategoriController::class,'kategori'])->name('kategori');
Route::get('/tambahkategori',[KategoriController::class,'tambahkategori'])->name('tambahkategori');
Route::post('/tambahkategoripost',[KategoriController::class,'tambahkategoripost'])->name('tambahkategoripost');
Route::get('/editkategori/{id}',[KategoriController::class,'editkategori'])->name('editkategori');
Route::post('/editkategoripost/{id}',[KategoriController::class,'editkategoripost'])->name('editkategoripost');
Route::get('/deletekategori/{id}',[KategoriController::class,'deletekategori'])->name('deletekategori');

// peminjaman
Route::get('/peminjaman',[PeminjamanController::class,'peminjaman'])->name('peminjaman');
Route::get('/tambahpeminjaman',[PeminjamanController::class,'tambahpeminjaman'])->name('tambahpeminjaman');
Route::post('/insert', [PeminjamanController::class, 'insert'])->name('insert');
>>>>>>> 6483b28293f6ab6975280054154bed5ae874c24e
Route::get('/editpeminjaman/{id}', [PeminjamanController::class, 'editpeminjaman'])->name('editpeminjaman');
Route::post('/editpeminjamanpost/{id}', [PeminjamanController::class, 'editpeminjamanpost'])->name('editpeminjamanpost');
Route::get('/deletepeminjaman/{id}', [PeminjamanController::class, 'deletepeminjaman'])->name('deletepeminjaman');
Route::get('/scane',[PeminjamanController::class,'scane'])->name('scane');
Route::post('/validasi',[PeminjamanController::class,'validasi'])->name('validasi');

// pengembalian
Route::get('/pengembalian',[PengembalianController::class,'pengembalian'])->name('pengembalian');
Route::get('/tambahpengembalian',[PengembalianController::class,'tambahpengembalian'])->name('tambahpengembalian');
Route::post('/tambahpengembalianpost',[PengembalianController::class,'tambahpengembalianpost'])->name('tambahpengembalianpost');
Route::get('/deletepengembalian/{id}',[PengembalianController::class,'deletepengembalian'])->name('deletepengembalian');

// anggota
Route::get('/daftaranggota',[DaftarAnggotaController::class,'daftaranggota'])->name('daftaranggota');
Route::get('/tambahanggota',[DaftarAnggotaController::class,'tambahanggota'])->name('tambahanggota');
Route::post('/tambahanggotapost',[DaftarAnggotaController::class,'tambahanggotapost'])->name('tambahanggotapost');
Route::post('/editanggotapost/{id}',[DaftarAnggotaController::class,'editanggotapost'])->name('editanggotapost');
Route::get('/detailanggota/{id}',[DaftarAnggotaController::class,'detailanggota'])->name('detailanggota');
Route::get('/deleteanggota/{id}',[DaftarAnggotaController::class,'deleteanggota'])->name('deleteanggota');
// Route::get('/qr_code/{id}',[DaftarAnggotaController::class,'qr_code'])->name('qr_code');
Route::post('/cetakidcard',[DaftarAnggotaController::class,'cetakidcard'])->name('cetakidcard');
Route::get('/idcard/{id}',[DaftarAnggotaController::class,'idcard'])->name('idcard');

// petugas
Route::get('/petugas',[LoginController::class,'petugas'])->name('petugas');

});