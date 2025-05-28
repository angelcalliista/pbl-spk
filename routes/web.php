<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');;
Route::get('/registrasi', [LoginController::class, 'showRegisterForm']);

Route::post('/login-proses', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::middleware('auth')->group(function () {
    // alternatif
    Route::get('/alternatif', [AlternatifController::class, 'index']);

    // aspek
    Route::get('/aspek', [AspekController::class, 'index']);

    // kriteria
    Route::get('/kriteria', [KriteriaController::class, 'index']);

    // input nilai alternatif
    Route::get('/nilai-profile', [ProfileController::class, 'index']);
    Route::post('/nilai-profile/store', [ProfileController::class, 'store'])->name('nilai_profile.save');;

    // perhitungan
    Route::get('/perhitungan', [PerhitunganController::class, 'index']);
});

// // alternatif
// Route::get('/alternatif', [AlternatifController::class, 'index']);

// // aspek
// Route::get('/aspek', [AspekController::class, 'index']);

// // kriteria
// Route::get('/kriteria', [KriteriaController::class, 'index']);

// // input nilai alternatif
// Route::get('/nilai-profile', [ProfileController::class, 'index']);
// Route::post('/nilai-profile/store', [ProfileController::class, 'store'])->name('nilai_profile.save');;

// // perhitungan
// Route::get('/perhitungan', [PerhitunganController::class, 'index']);
// Route::get('/profile-matching', [PerhitunganController::class, 'calculateAllProfileMatching']);