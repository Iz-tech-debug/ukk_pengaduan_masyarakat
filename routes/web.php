<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
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


Route::get('/admin', function () {
    return view('Pengguna.Admin.index');
});

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('masuk');

Route::post('/masuk', [LoginController::class, 'login'])->name('masuk');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Masyarakat
Route::post('/register', [MasyarakatController::class, 'Registrasi'])->name('register');

// Petugas
Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas_index');

Route::post('/tambah_petugas', [PetugasController::class, 'store'])->name('tambah_petugas');

Route::put('/ubah_petugas/{id_petugas}', [PetugasController::class, 'update'])->name('ubah_petugas');

Route::delete('/hapus_petugas/{id_petugas}', [PetugasController::class, 'destroy'])->name('hapus_petugas');

