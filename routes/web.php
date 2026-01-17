<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{
    ProfileController,
    SkillController,
    SkillProgressController,
    TrainingController,
    CVController,
    ProjectLabController,
    ProjectAssignmentController,
    PortfolioController,
    CertificateController,
    DashboardController
};

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;


use App\Models\{
    CourseProgress,
    ProjectAssignment
};

/*
|--------------------------------------------------------------------------
| Landing
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| AUTH ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | CV Builder
    |--------------------------------------------------------------------------
    */
    Route::prefix('cv')->name('cv.')->group(function () {
        Route::get('/', [CVController::class, 'index'])->name('index');
        Route::post('/store', [CVController::class, 'store'])->name('store');
        Route::get('/preview', [CVController::class, 'preview'])->name('preview');
        Route::get('/download', [CVController::class, 'downloadPDF'])->name('download');
    });

    /*
    |--------------------------------------------------------------------------
    | Skills
    |--------------------------------------------------------------------------
    */
    Route::prefix('skills')->name('skills.')->group(function () {
        Route::get('/', [SkillController::class, 'index'])->name('index');
        Route::get('/my-learning', [SkillController::class, 'myLearning'])->name('my-learning');

        Route::get('/{slug}', [SkillController::class, 'show'])->name('show');
        Route::get('/{slug}/modules/{moduleIndex}', [SkillController::class, 'module'])
            ->whereNumber('moduleIndex')
            ->name('module');

        Route::post('/{slug}/start', [SkillProgressController::class, 'start'])->name('start');
        Route::post('/{slug}/modules/{moduleIndex}/complete', [SkillProgressController::class, 'completeModule'])
            ->whereNumber('moduleIndex')
            ->name('module.complete');
    });

    /*
    |--------------------------------------------------------------------------
    | Certificates
    |--------------------------------------------------------------------------
    */
    Route::get('/certificates', [CertificateController::class, 'index'])
        ->name('certificates.index');

    Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])
        ->name('certificates.show');

    Route::get('/certificates/{certificate}/download', [CertificateController::class, 'download'])
        ->name('certificates.download');

    /*
    |--------------------------------------------------------------------------
    | Project Lab
    |--------------------------------------------------------------------------
    */
    Route::get('/project-lab', [ProjectLabController::class, 'index'])
        ->name('projectlab.index');

    Route::get('/project-lab/{slug}', [ProjectLabController::class, 'show'])
        ->name('projectlab.show');

    Route::post('/project-lab/{slug}/take', [ProjectAssignmentController::class, 'take'])
        ->name('projectlab.take');

    Route::post('/project-lab/{slug}/submit', [ProjectAssignmentController::class, 'submit'])
        ->name('projectlab.submit');

    /*
    |--------------------------------------------------------------------------
    | Portfolio
    |--------------------------------------------------------------------------
    */
    Route::get('/portfolio', [PortfolioController::class, 'index'])
        ->name('portfolio.index');

    Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])
        ->name('portfolio.show');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
