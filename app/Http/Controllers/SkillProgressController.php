<?php

namespace App\Http\Controllers;

use App\Models\CourseProgress;
use App\Models\ModuleProgress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkillProgressController extends Controller
{
    /**
     * Mulai / lanjut pelatihan.
     * Dipanggil dari route: skills/{slug}/start
     */
    public function start(string $slug): RedirectResponse
    {
        $userId = Auth::id();

        // Ambil daftar course dari SkillController
        $courses = app(\App\Http\Controllers\SkillController::class)->getCourses();
        $course  = collect($courses)->firstWhere('slug', $slug);
        abort_if(! $course, 404);

        // Kalau belum ada modul sama sekali, balik ke halaman pelatihan
        $modules = $course['modules'] ?? [];
        if (empty($modules)) {
            return redirect()->route('skills.show', $slug);
        }

        // Pastikan ada / buat progress course-nya
        CourseProgress::firstOrCreate(
            [
                'user_id'     => $userId,
                'course_slug' => $slug,
            ],
            [
                'status'            => 'in_progress',
                'completed_modules' => 0,
            ]
        );

        // Arahkan user ke modul pertama (index 0)
        return redirect()->route('skills.module', [$slug, 0]);
    }

    public function completeModule(Request $request, string $slug, int $moduleIndex): RedirectResponse
    {
        $userId = Auth::id();

        // Ambil daftar course dari SkillController
        $courses = app(\App\Http\Controllers\SkillController::class)->getCourses();
        $course  = collect($courses)->firstWhere('slug', $slug);

        abort_if(! $course, 404);

        $modules = $course['modules'] ?? [];
        abort_if(! array_key_exists($moduleIndex, $modules), 404);

        // Validasi input tugas
        $request->validate([
            'submission_url'  => ['nullable', 'url'],
            'submission_file' => ['nullable', 'file', 'max:5120'], // maks 5MB
            'notes'           => ['nullable', 'string'],
        ]);

        // Pastikan user mengisi minimal satu (link / file / catatan)
        if (
            ! $request->filled('submission_url') &&
            ! $request->hasFile('submission_file') &&
            ! $request->filled('notes')
        ) {
            return back()
                ->withErrors(['submission' => 'Minimal isi link, file, atau catatan tugas dulu.'])
                ->withInput();
        }

        // Ambil progress modul yang sudah ada (kalau ada)
        $progress = ModuleProgress::firstOrNew([
            'user_id'      => $userId,
            'course_slug'  => $slug,
            'module_index' => $moduleIndex,
        ]);

        // Handle file upload (kalau ada)
        $filePath = $progress->submission_file_path; // keep lama kalau tidak upload baru

        if ($request->hasFile('submission_file')) {
            // Optional: hapus file lama
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $filePath = $request->file('submission_file')->store('module_submissions', 'public');
        }

        // Simpan progress + tugas
        $progress->submission_url       = $request->input('submission_url');
        $progress->submission_file_path = $filePath;
        $progress->notes                = $request->input('notes');
        $progress->is_completed         = true;
        $progress->completed_at         = now();
        $progress->status               = 'approved'; // sementara auto approved
        $progress->save();

        // Hitung progress course
        $totalModules = count($modules);

        $completedCount = ModuleProgress::where('user_id', $userId)
            ->where('course_slug', $slug)
            ->where('is_completed', true)
            ->count();

        $statusCourse = $completedCount >= $totalModules ? 'completed' : 'in_progress';

        CourseProgress::updateOrCreate(
            [
                'user_id'     => $userId,
                'course_slug' => $slug,
            ],
            [
                'status'            => $statusCourse,
                'completed_modules' => $completedCount,
            ]
        );

        // Tentukan mau redirect ke mana
        $nextIndex = $moduleIndex + 1;

        if ($nextIndex < $totalModules) {
            // Masih ada modul berikutnya → pindah ke modul berikutnya
            return redirect()
                ->route('skills.module', [$slug, $nextIndex])
                ->with('status', 'module_completed');
        }

        // Ini modul terakhir → kembali ke halaman pelatihan
        return redirect()
            ->route('skills.show', $slug)
            ->with('status', 'course_completed');
    }
}
