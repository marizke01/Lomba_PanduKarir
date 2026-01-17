<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\CourseProgress;
use App\Models\ModuleProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $activeCategory = $request->query('category');

        $skills = Skill::where('is_active', true)
            ->when($activeCategory, fn ($q) =>
                $q->where('category', $activeCategory)
            )
            ->latest()
            ->get();

        return view('skills.index', [
            'courses' => $skills,
            'recommended' => $skills->take(1)->toArray(),
            'activeCategory' => $activeCategory,
        ]);
    }

    public function show(string $slug)
{
    $skill = Skill::where('slug', $slug)->firstOrFail();
    $modules = $skill->modules ?? [];

    $userId = auth()->id();

    $progressByModule = ModuleProgress::where('user_id', $userId)
        ->where('course_slug', $slug)
        ->get()
        ->keyBy('module_index');

    $completedModules = $progressByModule->where('is_completed', true)->count();
    $totalModules = count($modules);

    $progressPercent = $totalModules > 0
        ? round(($completedModules / $totalModules) * 100)
        : 0;

    return view('skills.show', [
        'course' => $skill->toArray(),
        'completedModules' => $completedModules,
        'totalModules' => $totalModules,
        'progressPercent' => $progressPercent,
        'progressByModule' => $progressByModule,
    ]);
}


    public function module(string $slug, int $moduleIndex)
{
    $skill = Skill::where('slug', $slug)->firstOrFail();
    $modules = $skill->modules ?? [];

    abort_if(!isset($modules[$moduleIndex]), 404);

    $progress = ModuleProgress::where('user_id', auth()->id())
        ->where('course_slug', $slug)
        ->where('module_index', $moduleIndex)
        ->first();

    return view('skills.module', [
        'course' => $skill->toArray(),
        'module' => $modules[$moduleIndex],
        'moduleIndex' => $moduleIndex,
        'totalModules' => count($modules),
        'progress' => $progress,
    ]);
}


}