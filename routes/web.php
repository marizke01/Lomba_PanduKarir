<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;

Route::middleware('auth')->group(function () {
    Route::get('/cv-builder', [CvController::class, 'index'])->name('cv.index');             // pilih template
    Route::get('/cv-builder/create/{template}', [CvController::class, 'create'])->name('cv.create'); // form + preview
    Route::post('/cv-builder/generate', [CvController::class, 'generate'])->name('cv.generate'); // generate PDF / save
});

Route::get('/cv-builder/preview/{template}', [CvController::class, 'preview'])
    ->middleware('auth')
    ->name('cv.preview');


// === halaman utama ===
Route::get('/', function () {
    return view('home');   // arah ke resources/views/home.blade.php
})->name('home');

// === dashboard (hanya setelah login) ===
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// === profile (hanya setelah login) ===
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
