<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use App\Models\Masyarakat;

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

// Halaman Utama
Route::get('/halaman_utama', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/halaman_utama');
});

Route::get('/registrasi', function () {
    return view('regist');
});

// Admin
Route::get('/admin_index', function () {
    return view('Pengguna.Admin.index');
})->middleware('authlevel:admin');


// Petugas
Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas_index');

Route::post('/tambah_petugas', [PetugasController::class, 'store'])->name('tambah_petugas');

Route::put('/ubah_petugas/{id_petugas}', [PetugasController::class, 'update'])->name('ubah_petugas');

Route::delete('/hapus_petugas/{id_petugas}', [PetugasController::class, 'destroy'])->name('hapus_petugas');


// Masyarakat
Route::get('/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat_index');

// Masyarakat Registrasi
Route::post('/register', [MasyarakatController::class, 'Registrasi'])->name('register');

Route::post('/tambah_masyarakat', [MasyarakatController::class, 'store'])->name('tambah_masyarakat');

Route::put('/ubah_masyarakat/{id}', [MasyarakatController::class, 'update'])->name('ubah_masyarakat');

Route::delete('/hapus_masyarakat/{id}', [MasyarakatController::class, 'destroy'])->name('hapus_masyarakat');


// Pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan_index');

Route::put('/selesaikan_pengaduan/{id_pengaduan}', [PengaduanController::class, 'store'])->name('selesaikan_pengaduan');

Route::delete('/hapus_pengaduan/{id_pengaduan}', [PengaduanController::class, 'destroy'])->name('hapus_masyarakat');


// Update Status & Tanggapan
Route::post('/tanggapi', [TanggapanController::class, 'store'])->name('tanggapi');

Route::get('/data_pengaduan', [PengaduanController::class, 'DataPengaduan'])->name('DataPengadu');

// Pengaduan Masyarakat
Route::post('/masyarakatngadu', [PengaduanController::class, 'MasyarakatNgadu'])->name('masyarakatngadu');



// Tanggapan


// Petugas
Route::get('/petugas_index', function () {
    return view('Pengguna.Petugas.index');
})->middleware('authlevel:petugas');

// Masyarakat
Route::get('/masyarakat_index', function () {
    return view('Pengguna.Masyarakat.index');
})->middleware('authlevel:masyarakat');


// Otentikasi
Route::get('/login', [LoginController::class, 'index'])->name('index_login');

Route::post('/masuk', [LoginController::class, 'login'])->name('masuk');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');





// Logout
Route::get('/logout', function () {
    // Hapus semua sesi
    session()->flush();

    // Redirect ke halaman login
    return redirect('/halaman_utama')->with('success', 'Anda berhasil logout.');
});
