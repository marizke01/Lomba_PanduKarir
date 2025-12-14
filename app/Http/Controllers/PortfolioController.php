<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ProjectSubmission;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = ProjectSubmission::where('user_id', Auth::id())
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('portfolio.index', compact('portfolios'));
    }

    public function show($id)
{
    $portfolio = ProjectSubmission::where('id', $id)
        ->where('user_id', Auth::id())
        ->where('status', 'approved')
        ->firstOrFail();

    return view('portfolio.show', compact('portfolio'));
}

}
