<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\{
    CourseProgress,
    ProjectAssignment,
    ProjectSubmission,
    Certificate
};

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /* =====================
         * PELATIHAN SKILL
         * ===================== */
        $totalCourses = CourseProgress::where('user_id', $user->id)->count();

        $completedCourses = CourseProgress::where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();

        if ($totalCourses === 0) {
            $trainingStatus = 'Belum';
        } elseif ($completedCourses === $totalCourses) {
            $trainingStatus = 'Sedang';
        } else {
            $trainingStatus = 'Sedang';
        }

        /* =====================
         * PROJECT LAB
         * ===================== */
        $totalProjects = ProjectAssignment::where('user_id', $user->id)->count();

        $approvedProjects = ProjectSubmission::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();

        if ($totalProjects === 0) {
            $projectStatus = 'Belum';
        } elseif ($approvedProjects > 0) {
            $projectStatus = 'Sedang';
        } else {
            $projectStatus = 'Sedang';
        }

        /* =====================
         * SERTIFIKAT & PORTFOLIO
         * ===================== */
        $certificateCount = Certificate::where('user_id', $user->id)->count();

        $portfolioCount = ProjectSubmission::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();

        return view('dashboard', compact(
            'completedCourses',
            'trainingStatus',
            'totalProjects',
            'projectStatus',
            'certificateCount',
            'portfolioCount'
        ));
    }
}
