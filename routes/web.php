<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MessageController;

// Halaman utama PanduKarir
Route::get('/', function () {
    return view('home');
})->name('home');

// About Us
Route::get('/about', function () {
    return view('about');
})->name('about');

// Programs
// Route::get('/programs', function () {
//     return view('programs');
// })->name('programs');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Team (kalau kamu ingin team juga bisa diakses dari navbar)
Route::get('/team', function () {
    return view('team');
})->name('team');

// Bootcamp (jika dari layout TechBootcamp)
Route::get('/bootcamp', function () {
    return view('bootcamp');
})->name('bootcamp');

// Resource route untuk CourseController
Route::resource('courses', CourseController::class);

// Resource route untuk MessageController
Route::resource('messages', MessageController::class);
