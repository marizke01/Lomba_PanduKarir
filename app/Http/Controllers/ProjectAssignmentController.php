<?php

namespace App\Http\Controllers;

use App\Models\ProjectAssignment;
use App\Models\ProjectSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Certificate;
use Illuminate\Support\Str;


class ProjectAssignmentController extends Controller
{
    // Ambil / mulai project
    public function take(string $slug): RedirectResponse
    {
        $userId = Auth::id();

        ProjectAssignment::updateOrCreate(
            [
                'user_id'      => $userId,
                'project_slug' => $slug,
            ],
            [
                'status'     => 'in_progress',
                'started_at' => now(),
            ]
        );

        return back()->with('status', 'project_taken');
    }

    // Submit hasil project
    public function submit(Request $request, string $slug): RedirectResponse
    {
        $userId = Auth::id();

        $validated = $request->validate([
            'submission_url' => ['required', 'url'],
            'notes'          => ['nullable', 'string'],
        ], [
            'submission_url.required' => 'Link hasil project wajib diisi.',
            'submission_url.url'      => 'Format link tidak valid.',
        ]);

        // 1️⃣ LOGIC LAMA (JANGAN DIUBAH)
        ProjectAssignment::updateOrCreate(
            [
                'user_id'      => $userId,
                'project_slug' => $slug,
            ],
            [
                'status'         => 'submitted',
                'submission_url' => $validated['submission_url'],
                'notes'          => $validated['notes'] ?? null,
                'submitted_at'   => now(),
            ]
        );

        // 2️⃣ LOGIC BARU (AMAN): MASUK PORTOFOLIO
        ProjectSubmission::updateOrCreate(
            [
                'user_id'      => $userId,
                'project_slug' => $slug,
            ],
            [
                'title'       => ucwords(str_replace('-', ' ', $slug)),
                'description' => $validated['notes'] ?? null,
                'result_url'  => $validated['submission_url'],
                'status'      => 'approved', // auto masuk portofolio
            ]
        );

        // AUTO BUAT SERTIFIKAT
        Certificate::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'project_slug' => $slug,
            ],
            [
                'project_title' => ucwords(str_replace('-', ' ', $slug)),
                'certificate_number' => 'SB-' . strtoupper(Str::random(8)),
                'issued_at' => now(),
            ]
        );


        return redirect()
            ->route('portfolio.index')
            ->with('status', 'project_submitted');
    }
}
