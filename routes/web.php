<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DaftarbukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DaftarAnggotaController;
use App\Http\Controllers\LaporanpinjamController;
use App\Http\Controllers\CartController;

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
Route::get('/beranda',[LoginController::class,'beranda'])->name('beranda');
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
// Route::get('/peminjaman/{id}',[PeminjamanController::class,'peminjamanmod'])->name('peminjaman');
Route::get('/tambahpeminjaman',[PeminjamanController::class,'tambahpeminjaman'])->name('tambahpeminjaman');
Route::post('/insert', [PeminjamanController::class, 'insert'])->name('insert');
Route::get('/editpeminjaman/{id}', [PeminjamanController::class, 'editpeminjaman'])->name('editpeminjaman');
Route::post('/editpeminjamanpost/{id}', [PeminjamanController::class, 'editpeminjamanpost'])->name('editpeminjamanpost');
Route::get('/deletepeminjaman/{id}', [PeminjamanController::class, 'deletepeminjaman'])->name('deletepeminjaman');
Route::get('/scane',[PeminjamanController::class,'scane'])->name('scane');
Route::post('/validasi',[PeminjamanController::class,'validasi'])->name('validasi');
Route::get('/getBooks', [PeminjamanController::class, 'getBooks'])->name('getBooks');
Route::get('/tambahpinjam2',[PeminjamanController::class,'tambahpinjam2'])->name('tambahpinjam2');
Route::get('/result',[PeminjamanController::class,'result'])->name('result');
Route::get('/detailbuku/{id}',[PeminjamanController::class,'detailbuku'])->name('detailbuku');

// Route::get('/buku_list',[PeminjamanController::class,'buku_list'])->name('buku_list');

//Cart
// Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cartpost', [CartController::class, 'cartpost'])->name('cartpost');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('remove/{id}', [CartController::class, 'remove'])->name('remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('cartlist', [CartController::class, 'cartlist'])->name('cartlist');
Route::post('/postcart', [CartController::class, 'postcart'])->name('postcart');
Route::get('listcart', [CartController::class, 'listcart'])->name('listcart');
Route::get('remov/{id}', [CartController::class, 'remov'])->name('remov');


// pengembalian
Route::get('/pengembalian',[PengembalianController::class,'pengembalian'])->name('pengembalian');
Route::get('/tambahpengembalian/{id}',[PengembalianController::class,'tambahpengembalian'])->name('tambahpengembalian');
Route::post('/tambahpengembalian',[PengembalianController::class,'tambahpengembalian'])->name('tambahpengembalian');
Route::post('/tambahpengembalianpost/{id}',[PengembalianController::class,'tambahpengembalianpost'])->name('tambahpengembalianpost');
Route::get('/deletepengembalian/{id}',[PengembalianController::class,'deletepengembalian'])->name('deletepengembalian');
Route::post('/pilihbuku',[PengembalianController::class,'pilihbuku'])->name('pilihbuku');
Route::get('/modalBK/{id}',[PengembalianController::class,'modalBK'])->name('modalBK');
Route::post('/pilihan',[PengembalianController::class,'pilihan'])->name('pilihan');


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

// laporan
Route::get('/denda',[DendaController::class,'denda'])->name('denda');
Route::get('/detaildenda/{id}',[DendaController::class,'detaildenda'])->name('detaildenda');

Route::get('/laporanpinjam',[LaporanpinjamController::class,'laporanpinjam'])->name('laporanpinjam');
Route::get('/detailpinjam/{id}',[LaporanpinjamController::class,'detailpinjam'])->name('detailpinjam');
Route::get('/pendapatan',[DendaController::class,'pendapatan'])->name('pendapatan');



});