<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PendaftaranController;

// 🏠 Halaman Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/cekdebug', function () {
//     return 'INI PROJEK YANG BENAR';
// });


// ℹ️ Halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');

// 📚 Resource routes utama
Route::resource('seminar', SeminarController::class);
Route::resource('peserta', PesertaController::class);
Route::resource('pendaftaran', PendaftaranController::class);

// 📝 Route tambahan untuk daftar seminar
Route::post('/seminars/daftar', [SeminarController::class, 'daftar'])->name('seminars.daftar');