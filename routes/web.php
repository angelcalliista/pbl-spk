<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerhitunganController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile-matching', [PerhitunganController::class, 'calculateAllProfileMatching']);

// Contoh route dashboard (halaman utama setelah login)
Route::get('/dashboard', function () {
    return view('dashboard'); // buat view dashboard.blade.php sesuai kebutuhan
})->middleware('auth')->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});
