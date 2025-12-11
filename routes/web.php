<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('landing');   // <--- penting
})->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::get('/skills/{slug}', [SkillController::class, 'show'])->name('skills.show');
});

Route::get('/belajar-skill', [\App\Http\Controllers\TrainingController::class, 'index'])
    ->name('trainings.index');

Route::get('/belajar-skill/{training}', [\App\Http\Controllers\TrainingController::class, 'show'])
    ->name('trainings.show');


require __DIR__.'/auth.php';
