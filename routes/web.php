<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProfileController; // Untuk nilai-profile
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\Auth\LoginController; // Sesuaikan path jika controller auth Anda berbeda
use App\Http\Controllers\HomeController; // Buat controller ini jika belum ada
use App\Http\Controllers\Api\FiturInfoController; // Buat controller ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/calon-list', [FiturInfoController::class, 'getCalonList'])->name('api.calon.list');
Route::get('/perhitungan-detail', [FiturInfoController::class, 'getPerhitunganDetail'])->name('api.perhitungan.detail');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Penting dinamai 'login' karena middleware auth sering redirect ke sini
    Route::post('/login-proses', [LoginController::class, 'login'])->name('login.proses'); // Atau sesuaikan dengan action form Anda
    Route::get('/registrasi', [LoginController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.store'); // Atau sesuaikan dengan action form Anda
});

// 3. RUTE UNTUK PENGGUNA YANG SUDAH LOGIN (AUTHENTICATED)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // alternatif
        // Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::resource('alternatif', AlternatifController::class);
        // aspek
        Route::resource('aspek', AspekController::class);

        // Route::get('aspek', [AspekController::class, 'index'])->name('aspek.index');

        // kriteria
        Route::resource('kriteria', KriteriaController::class);

        // input nilai alternatif
        Route::resource('profile', ProfileController::class);

        // Route::get('/nilai-profile', [ProfileController::class, 'index'])->name('nilaiprofile.index');
        // Route::post('/nilai-profile/store', [ProfileController::class, 'store'])->name('nilaiprofile.store');

        // perhitungan
        Route::resource('perhitungan', PerhitunganController::class,);

        // Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
    });
});
