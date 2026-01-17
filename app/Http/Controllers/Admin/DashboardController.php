<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProjectLab;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers'   => User::count(),
            'totalSkills'  => Skill::count(),
            'totalProjects'=> ProjectLab::count(),
        ]);
    }
}

