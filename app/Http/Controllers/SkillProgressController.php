<?php

namespace App\Http\Controllers;

use App\Models\CourseProgress;
use App\Models\ModuleProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkillProgressController extends Controller
{
    public function start(string $slug)
    {
        $userId = Auth::id();

        CourseProgress::firstOrCreate(
            [
                'user_id'     => $userId,
                'course_slug' => $slug,
            ],
            [
                'status'     => 'in_progress',
                'started_at' => now(),
            ]
        );

        return redirect()->route('skills.module', [$slug, 0]);
    }

    public function completeModule(Request $request, string $slug, int $moduleIndex)
    {
        $userId = Auth::id();

        $request->validate([
            'submission_url'  => ['nullable', 'url'],
            'submission_file' => ['nullable', 'file', 'max:5120'],
            'notes'           => ['nullable', 'string'],
        ]);

        if (
            !$request->filled('submission_url') &&
            !$request->hasFile('submission_file') &&
            !$request->filled('notes')
        ) {
            return back()->withErrors([
                'submission' => 'Isi minimal salah satu: link, file, atau catatan.'
            ]);
        }

        $progress = ModuleProgress::firstOrNew([
            'user_id'      => $userId,
            'course_slug'  => $slug,
            'module_index' => $moduleIndex,
        ]);

        if ($request->hasFile('submission_file')) {
            $progress->submission_file_path =
                $request->file('submission_file')->store('module_submissions', 'public');
        }

        $progress->submission_url = $request->submission_url;
        $progress->notes = $request->notes;
        $progress->is_completed = true;
        $progress->completed_at = now();
        $progress->status = 'approved';
        $progress->save();

        // cek total modul
        $totalModules = ModuleProgress::where('user_id', $userId)
            ->where('course_slug', $slug)
            ->count();

        $completedModules = ModuleProgress::where('user_id', $userId)
            ->where('course_slug', $slug)
            ->where('is_completed', true)
            ->count();

        if ($completedModules >= $totalModules) {
            CourseProgress::where('user_id', $userId)
                ->where('course_slug', $slug)
                ->update([
                    'status'       => 'completed',
                    'completed_at' => now(),
                ]);

            return redirect()->route('skills.show', $slug)
                ->with('status', 'course_completed');
        }

        return redirect()->route('skills.module', [$slug, $moduleIndex + 1]);
    }
}
