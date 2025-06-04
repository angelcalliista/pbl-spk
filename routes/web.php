<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\FiturInfoController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/calon-list', [FiturInfoController::class, 'getCalonList'])->name('api.calon.list');
Route::get('/perhitungan-detail', [FiturInfoController::class, 'getPerhitunganDetail'])->name('api.perhitungan.detail');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login'])->name('login.proses');
    Route::get('/registrasi', [LoginController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.store');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('alternatif', AlternatifController::class);
        Route::resource('aspek', AspekController::class);
        Route::resource('kriteria', KriteriaController::class);
        Route::resource('profile', ProfileController::class);
        Route::resource('perhitungan', PerhitunganController::class,);
    });
});
