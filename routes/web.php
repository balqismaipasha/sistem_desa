<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PDFController;

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

Route::get('/welcome', function () {
    return view('welcome');
});


// login
Route::get('/', [LoginController::class, 'index']);
Route::post('/logins', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


// registration
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/daftarakun', [RegisterController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index']);

// penduduk
Route::middleware(['auth:sanctum', 'verified'])->get('/penduduk',[PendudukController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/form_tambah_penduduk',function() {return view('kependudukan/tambah_penduduk');});
Route::post('/simpan_penduduk',[PendudukController::class,'simpan']);
Route::middleware(['auth:sanctum', 'verified'])->get('/hapus_penduduk/{id}', [PendudukController::class, 'hapus']);
Route::middleware(['auth:sanctum', 'verified'])->get('/edit_penduduk/{id}', [PendudukController::class, 'form_edit_penduduk']);
Route::post('/ubah_penduduk/{id}', [PendudukController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->get('/lihat_detail_penduduk/{id}', [PendudukController::class, 'detail_penduduk']);


// route kartu keluarga
Route::middleware(['auth:sanctum', 'verified'])->get('/kartu_keluarga',[KartuKeluargaController::class,'index']);
Route::post('/simpan_kk',[KartuKeluargaController::class,'simpan_kk_baru']);
Route::middleware(['auth:sanctum', 'verified'])->get('/form_tambah_kk',function() {return view('kependudukan/tambah_kk');});
Route::middleware(['auth:sanctum', 'verified'])->get('/lihat_anggota_keluarga/{id}', [KartuKeluargaController::class, 'detail_anggota_KK']);
Route::middleware(['auth:sanctum', 'verified'])->get('/tambah_anggota_keluarga/{id}', [KartuKeluargaController::class, 'tambah_anggota_KK']);
Route::post('/simpan_anggota_kk',[KartuKeluargaController::class,'simpan_anggota_kk']);
Route::middleware(['auth:sanctum', 'verified'])->get('/edit_KK/{id}', [KartuKeluargaController::class, 'form_edit_KK']);
Route::post('/ubah_KK/{id}', [KartuKeluargaController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->get('/hapus_KK/{id}', [KartuKeluargaController::class, 'hapus']);
Route::middleware(['auth:sanctum', 'verified'])->get('/hapus_anggota_kk/{id}/{no}', [KartuKeluargaController::class, 'hapus_anggota_kk']);


// bantuan
Route::middleware(['auth:sanctum', 'verified'])->get('/bantuan',[BantuanController::class,'index']);
Route::post('/simpan_bantuan',[BantuanController::class,'simpan']);
Route::post('/ubah_bantuan/{id}', [BantuanController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->get('/hapus_bantuan/{id}', [BantuanController::class, 'hapus']);

// Profil
Route::middleware(['auth:sanctum', 'verified'])->get('/profil',function() {return view('profil/profil');});
Route::post('/ubah_profil/{id}', [ProfilController::class, 'edit']);


// cetak
Route::middleware(['auth:sanctum', 'verified'])->get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);
Route::middleware(['auth:sanctum', 'verified'])->get('/generate-pdf-nik/{id}', [PDFController::class, 'generatePDF_NIK']);

