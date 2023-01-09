<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RusakController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukurusakController;
use App\Http\Controllers\DaftarbukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DaftarAnggotaController;
use App\Http\Controllers\LaporanpinjamController;

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
// Route::get('/rusak', function () {
//     return view('bukurusak.rusak');
// });

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
Route::get('/grafik',[LoginController::class,'grafik'])->name('grafik');

//Menu Admin
Route::get('/beranda',[LoginController::class,'beranda'])->name('beranda');
Route::get('/berandah',[LoginController::class,'berandah'])->name('berandah');
Route::group(['middleware' => ['auth', 'Cekrole:admin,petugas']], function(){

// buku
Route::get('/buku',[DaftarbukuController::class,'buku'])->name('buku');
Route::get('/tambahbuku',[DaftarbukuController::class,'tambahbuku'])->name('tambahbuku');
Route::post('/tambahbukupost',[DaftarbukuController::class,'tambahbukupost'])->name('tambahbukupost');
Route::get('/editbuku/{id}',[DaftarbukuController::class,'editbuku'])->name('editbuku');
Route::post('/editbukupost/{id}',[DaftarbukuController::class,'editbukupost'])->name('editbukupost');
Route::post('/cetakbarcode',[DaftarbukuController::class,'cetakbarcode'])->name('cetakbarcode');
Route::get('/deletebuku/{id}',[DaftarbukuController::class,'deletebuku'])->name('deletebuku');
Route::get('/bukupop',[DaftarbukuController::class,'bukupop'])->name('bukupop');

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
Route::get('/editpeminjaman/{id}', [PeminjamanController::class, 'editpeminjaman'])->name('editpeminjaman');
Route::post('/editpeminjamanpost/{id}', [PeminjamanController::class, 'editpeminjamanpost'])->name('editpeminjamanpost');
Route::get('/deletepeminjaman/{id}', [PeminjamanController::class, 'deletepeminjaman'])->name('deletepeminjaman');
Route::get('/scane',[PeminjamanController::class,'scane'])->name('scane');
Route::get('/tambahpinjam2',[PeminjamanController::class,'tambahpinjam2'])->name('tambahpinjam2');
Route::get('/autofill',[PeminjamanController::class,'autofill'])->name('autofill');
Route::get('/autoscane',[PeminjamanController::class,'autoscane'])->name('autoscane');
Route::get('/result',[PeminjamanController::class,'result'])->name('result');
Route::get('/detailbuku/{id}',[PeminjamanController::class,'detailbuku'])->name('detailbuku');
Route::get('/scanebuku',[PeminjamanController::class,'scanebuku'])->name('scanebuku');
Route::get('/cari',[PeminjamanController::class,'cari'])->name('cari');

//Cart
Route::post('/cartpost', [CartController::class, 'cartpost'])->name('cartpost');
Route::post('/cartpost2', [CartController::class, 'cartpost2'])->name('cartpost2');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('remove/{id}', [CartController::class, 'remove'])->name('remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('cartlist', [CartController::class, 'cartlist'])->name('cartlist');
Route::post('/postcart', [CartController::class, 'postcart'])->name('postcart');
Route::get('listcart', [CartController::class, 'listcart'])->name('listcart');
Route::get('remov/{id}', [CartController::class, 'remov'])->name('remov');
Route::get('decrementQuantity/{id}', [CartController::class, 'decrementQuantity'])->name('decrementQuantity');
Route::get('kurang/{id}', [CartController::class, 'kurang'])->name('kurang');


// pengembalian
Route::get('/pengembalian',[PengembalianController::class,'pengembalian'])->name('pengembalian');
Route::get('/tambahpengembalian/{id}',[PengembalianController::class,'tambahpengembalian'])->name('tambahpengembalian');
Route::post('/tambahpengembalianpost/{id}',[PengembalianController::class,'tambahpengembalianpost'])->name('tambahpengembalianpost');
Route::get('/deletepengembalian/{id}',[PengembalianController::class,'deletepengembalian'])->name('deletepengembalian');
Route::post('/pilihbuku',[PengembalianController::class,'pilihbuku'])->name('pilihbuku');
Route::get('/modalBK/{id}',[PengembalianController::class,'modalBK'])->name('modalBK');
Route::post('/pilihan',[PengembalianController::class,'pilihan'])->name('pilihan');
Route::get('/cetakpengembalian',[PengembalianController::class,'cetakpengembalian'])->name('cetakpengembalian');
Route::get('/disabled',[PengembalianController::class,'disabled'])->name('disabled');

// siswa
Route::get('/daftaranggota',[DaftarAnggotaController::class,'daftaranggota'])->name('daftaranggota');
Route::get('/tambahanggota',[DaftarAnggotaController::class,'tambahanggota'])->name('tambahanggota');
Route::post('/tambahanggotapost',[DaftarAnggotaController::class,'tambahanggotapost'])->name('tambahanggotapost');
Route::post('/editanggotapost/{id}',[DaftarAnggotaController::class,'editanggotapost'])->name('editanggotapost');
Route::get('/detailanggota/{id}',[DaftarAnggotaController::class,'detailanggota'])->name('detailanggota');
Route::get('/deleteanggota/{id}',[DaftarAnggotaController::class,'deleteanggota'])->name('deleteanggota');
Route::post('/cetakidcard',[DaftarAnggotaController::class,'cetakidcard'])->name('cetakidcard');
Route::get('/idcard/{id}',[DaftarAnggotaController::class,'idcard'])->name('idcard');
Route::get('/detail/{id}',[DaftarAnggotaController::class,'detail'])->name('detail');
Route::post('/importexcel',[DaftarAnggotaController::class,'importexcel'])->name('importexcel');

// petugas
Route::get('/petugas',[LoginController::class,'petugas'])->name('petugas');
Route::get('/tambahpetugas',[LoginController::class,'tambahpetugas'])->name('tambahpetugas');
Route::post('/tambahpetugaspost',[LoginController::class,'tambahpetugaspost'])->name('tambahpetugaspost');

// laporan
Route::get('/denda',[DendaController::class,'denda'])->name('denda');
Route::get('/detaildenda/{id}',[DendaController::class,'detaildenda'])->name('detaildenda');
Route::get('/laporanpinjam',[LaporanpinjamController::class,'laporanpinjam'])->name('laporanpinjam');
Route::get('/cetaklaporan',[LaporanpinjamController::class,'cetaklaporan'])->name('cetaklaporan');
Route::get('/export_excel',[LaporanpinjamController::class,'export_excel'])->name('export_excel');
Route::get('/detailpinjam/{id}',[LaporanpinjamController::class,'detailpinjam'])->name('detailpinjam');
Route::get('/pendapatan',[DendaController::class,'pendapatan'])->name('pendapatan');
Route::get('/grafik',[DendaController::class,'grafik'])->name('grafik');

//bukurusak
Route::get('/rusak',[RusakController::class,'rusak'])->name('rusak');
Route::post('/tambahrusakpost',[RusakController::class,'tambahrusakpost'])->name('tambahrusakpost');
Route::get('/editrusak/{id}',[RusakController::class,'editrusak'])->name('editrusak');
Route::post('/editrusakpost/{id}',[RusakController::class,'editrusakpost'])->name('editrusakpost');
});