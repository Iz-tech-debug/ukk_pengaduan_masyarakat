<?php

use App\Http\Controllers\IndexController;
use App\Models\Log;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\MasyarakatController;

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

// Admin Route
Route::get('/admin_index', [IndexController::class, 'AdminIndex'])
    ->middleware('authlevel:admin');

// Log Aktivitas
Route::get('/log', [LogController::class, 'index'])->name('log_index');



// Petugas
Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas_index');

Route::post('/tambah_petugas', [PetugasController::class, 'store'])->name('tambah_petugas');

Route::put('/ubah_petugas/{id_petugas}', [PetugasController::class, 'update'])->name('ubah_petugas');

Route::delete('/hapus_petugas/{id_petugas}', [PetugasController::class, 'destroy'])->name('hapus_petugas');


// Masyarakat
Route::get('/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat_index');

Route::post('/tambah_masyarakat', [MasyarakatController::class, 'store'])->name('tambah_masyarakat');

Route::put('/ubah_masyarakat/{id}', [MasyarakatController::class, 'update'])->name('ubah_masyarakat');

Route::delete('/hapus_masyarakat/{id}', [MasyarakatController::class, 'destroy'])->name('hapus_masyarakat');

// Masyarakat Registrasi
Route::post('/register', [MasyarakatController::class, 'Registrasi'])->name('register');


// Pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan_index');

Route::put('/selesaikan_pengaduan/{id_pengaduan}', [PengaduanController::class, 'store'])->name('selesaikan_pengaduan');

Route::delete('/hapus_pengaduan/{id_pengaduan}', [PengaduanController::class, 'destroy'])->name('hapus_masyarakat');

// Update Status & Tanggapan
Route::post('/tanggapi', [TanggapanController::class, 'store'])->name('tanggapi');

Route::post('/petugas_tanggapi', [TanggapanController::class, 'PetugasTanggapan'])->name('tanggapi');


// Petugas Pengaduan
Route::get('/petugas_pengaduan', [PengaduanController::class, 'PetugasPengaduan'])->name('petugas_pengaduan');

Route::put('/selesaikan_pengaduan/{id_pengaduan}', [PengaduanController::class, 'store'])->name('selesaikan_pengaduan');


// Pengaduan Masyarakat
Route::post('/masyarakatngadu', [PengaduanController::class, 'MasyarakatNgadu'])->name('masyarakatngadu');

Route::get('/data_pengaduan', [PengaduanController::class, 'DataPengaduan'])->name('DataPengadu');



// Laporan
Route::get('/laporan', [PengaduanController::class, 'LaporanIndex'])->name('laporan_index');

Route::get('/laporan/cetak', [PengaduanController::class, 'CetakLaporan'])->name('laporan_cetak');



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

// Logout
Route::get('/logout', function () {

    // **Log aktivitas petugas**
    Log::create([
        'id_petugas' => session('daffaid'),
        'keterangan' => 'Logout Dari Aplikasi',
        'timestamp' => now(),
    ]);

    session()->flush();

    // Redirect ke halaman login
    return redirect('/halaman_utama')->with('success', 'Anda berhasil logout.');
});
