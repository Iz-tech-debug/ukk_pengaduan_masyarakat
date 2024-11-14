<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
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


Route::post('/register', [MasyarakatController::class, 'Registrasi'])->name('register');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
