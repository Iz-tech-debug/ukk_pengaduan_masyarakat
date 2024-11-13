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

Route::get('/admin', function () {
    return view('Pengguna.Admin.index');
});

// Authentication
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/register', [MasyarakatController::class, 'store'])->name('register');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
