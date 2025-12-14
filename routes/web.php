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
    CertificateController
};

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

/*
|--------------------------------------------------------------------------
| AUTH ONLY (TANPA VERIFIED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD (PAKAI LOGIC TEMANMU)
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        $user = Auth::user();

        $totalCourses = CourseProgress::where('user_id', $user->id)->count();
        $completedCourses = CourseProgress::where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();

        $totalProjects = ProjectAssignment::where('user_id', $user->id)->count();
        $submittedProjects = ProjectAssignment::where('user_id', $user->id)
            ->where('status', 'submitted')
            ->count();

        return view('dashboard', compact(
            'totalCourses',
            'completedCourses',
            'totalProjects',
            'submittedProjects'
        ));
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | CV BUILDER (KODE KAMU)
    |--------------------------------------------------------------------------
    */
    Route::get('/cv', [CVController::class, 'index'])->name('cv.index');
    Route::post('/cv', [CVController::class, 'store'])->name('cv.store');
    Route::get('/cv/view', [CVController::class, 'show'])->name('cv.view');

    /*
    |--------------------------------------------------------------------------
    | SKILLS (GABUNG)
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


    // routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/certificates', [CertificateController::class, 'index'])
        ->name('certificates.index');

    Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])
        ->name('certificates.show');

    Route::get('/certificates/{certificate}/download', [CertificateController::class, 'download'])
        ->name('certificates.download');

    Route::get('/certificates/{id}/download', [CertificateController::class, 'download'])
        ->name('certificates.download');
});


    /*
    |--------------------------------------------------------------------------
    | PROJECT LAB (INI YANG KAMU BUTUH)
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

    Route::get('/portfolio', [PortfolioController::class, 'index'])
        ->name('portfolio.index');

    Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])
        ->name('portfolio.show');

});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
