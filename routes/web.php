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

// alternatif
Route::get('/alternatif', [AlternatifController::class, 'index']);

// aspek
Route::get('/aspek', [AspekController::class, 'index']);

// kriteria
Route::get('/kriteria', [KriteriaController::class, 'index']);

// input nilai alternatif
Route::get('/nilai-profile', [ProfileController::class, 'index']);

// perhitungan
Route::get('/perhitungan', [PerhitunganController::class, 'index']);
// Route::get('/profile-matching', [PerhitunganController::class, 'calculateAllProfileMatching']);