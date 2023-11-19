<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\detailLaporanController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\tanggapanController;
use App\Http\Controllers\tanggapanPetugasController;
use App\Http\Controllers\verifikasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// petugas
Route::get('/loginPetugas', [loginController::class, 'logPetgs']);
Route::post('/loginPetugas', [loginController::class, 'logPetugas']);

// masyarakat
Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'prosesLogin']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::get('/logout', [logoutController::class, "logout"]);

Route::get('/logoutPetugas', [logoutController::class, "logoutPtgs"]);

Route::middleware(['auth'])->group(function () {
    // masyarakat
    Route::get('/laporan', [laporanController::class, 'tampilData']);
    Route::post('/laporan', [laporanController::class, 'tambahPengaduan']);

    Route::get('/detailLaporan', [detailLaporanController::class, 'tampilData']);
    Route::get('/detailLaporan/hapus/{id_pengaduan}', [detailLaporanController::class, "hapus"]);
    // Route::get('/detailLaporan/tampilUbah/{id_pengaduan}', [detailLaporanController::class, "tampilUbah"]);
    Route::get('/detailLaporan/ubah/{id_pengaduan}', [detailLaporanController::class, "tampilUbah"]);
    Route::post('/detailLaporan/ubah/{id_pengaduan}', [detailLaporanController::class, "ubah"]);
    Route::get('/detailLaporan/detail/{id_pengaduan}', [detailLaporanController::class, "detail"]);

    Route::get('/tanggapan', [tanggapanController::class, 'tampilData']);
    
    Route::get('/verifikasi', [verifikasiController::class, 'verifikasi']);
});

Route::middleware(['cek_petugas'])->group(function () {
    
});

Route::middleware(['cek_petugas'])->group(function () {
    // petugas
    Route::get('/detailLaporanPetugas', [detailLaporanController::class, 'tampilDataPetugas']);
    Route::get('/detailLaporanPetugas/detailPetugas/{id_pengaduan}', [detailLaporanController::class, "detailPetugas"]);
    
    Route::get('/tanggapanPetugas', [tanggapanPetugasController::class, 'tampilDataPetugas']);
    Route::get('/tanggapanPetugas/tanggapi/{id_pengaduan}', [tanggapanPetugasController::class, "tanggapi"]);;
    Route::post('/tanggapanPetugas/tanggapi/{id_pengaduan}', [tanggapanPetugasController::class, "memberikanTanggapan"]);

    Route::get('/verifikasiPetugas', [verifikasiController::class, 'verifikasiPtgs']);
    Route::get('/verifikasiPetugas/tampilVerifikasi/{id_pengaduan}', [verifikasiController::class, "tampilVerifikasi"]);
    Route::post('/verifikasiPetugas/tampilVerifikasi/{id_pengaduan}', [verifikasiController::class, "ubahStatus"]);
});

Route::middleware(['cek_admin'])->group(function () {
    // admin
    Route::get('/registerPetugas', [AuthController::class, 'regPetgs']);
    Route::post('/registerPetugas', [AuthController::class, 'regPetugas']);

    Route::get('/home', [detailLaporanController::class, 'tampilAdmin']);
    Route::get('/detailLaporanAdmin', [detailLaporanController::class, 'tampilDataAdmin']);
    Route::get('/detailLaporanAdmin/detailAdmin/{id_pengaduan}', [detailLaporanController::class, "detailAdmin"]);
    
    Route::get('/detailLaporan/print/{id_pengaduan}', [detailLaporanController::class, 'print']);

    Route::get('/tanggapanAdmin', [tanggapanController::class, 'tampilDataAdmin']);
    Route::get('/tanggapan/tanggapi/{id_pengaduan}', [tanggapanController::class, "tanggapiAdmin"]);
    Route::post('/tanggapan/tanggapi/{id_pengaduan}', [tanggapanController::class, "memberikanTanggapanAdmin"]);

    Route::get('/verifikasiAdmin', [verifikasiController::class, 'verifikasiAdmin']);
    Route::get('/verifikasi/tampilVerifikasi/{id_pengaduan}', [verifikasiController::class, "tampilVerifikasiAdmin"]);
    Route::post('/verifikasi/tampilVerifikasi/{id_pengaduan}', [verifikasiController::class, "ubahStatusAdmin"]);
});
