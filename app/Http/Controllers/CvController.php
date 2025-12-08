<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cv;
use Illuminate\Support\Str;
use PDF; // if using barryvdh/laravel-dompdf

class CvController extends Controller
{
    // 1. Page choose template
    public function index()
    {
        $templates = [
            ['id'=>'modern','title'=>'Modern','thumb'=>'CV-modern.jpg','desc'=>'Clean & modern'],
            ['id'=>'minimalist','title'=>'Minimalist','thumb'=>'CV-minimal.jpg','desc'=>'Simple, ATS friendly'],
            ['id'=>'professional','title'=>'Professional','thumb'=>'CV-professional.jpg','desc'=>'Formal & corporate'],
        ];
        return view('cv.index', compact('templates'));
    }

    public function preview($template)
{
    $allowed = ['modern','minimalist','professional'];
    if (!in_array($template, $allowed)) abort(404);

    // data dummy untuk preview kosong
    $data = [
        'name' => 'Your Name',
        'email' => 'your@email.com',
        'phone' => '+62 812 3456 7890',
        'education' => "2009–2012 — First University\n2012–2015 — Second University\n2015–2017 — Third University",
        'experience' => "2017–2019 — First Company\n2019–2021 — Second Company",
        'skills' => "Web Design, UI/UX, Drawing, Animation",
        'template' => $template,
    ];

    return view('cv.templates.' . $template, $data);
}


    // 2. Form page (template selected)
    public function create($template)
    {
        $allowed = ['modern','minimalist','professional'];
        if (!in_array($template, $allowed)) abort(404);
        return view('cv.create', ['template'=>$template]);
    }

    // 3. Generate PDF (or preview/save)
    public function generate(Request $request)
    {
        $data = $request->validate([
            'template' => 'required|string',
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'education' => 'nullable|string',
            'experience' => 'nullable|string',
            'skills' => 'nullable|string',
            'action' => 'nullable|string', // preview | pdf | save
        ]);

        // optionally save to DB
        if ($request->action === 'save') {
            Cv::create(array_merge($data, ['user_id'=>Auth::id()]));
            return back()->with('success','CV saved.');
        }

        // preview in browser - render the template view for print
        if ($request->action === 'preview') {
            return view('cv.templates.' . $data['template'], $data);
        }

        // generate PDF (requires barryvdh/laravel-dompdf)
        if ($request->action === 'pdf') {
            $view = view('cv.templates.' . $data['template'], $data)->render();
            $pdf = PDF::loadHTML($view)->setPaper('a4', 'portrait');
            return $pdf->download(Str::slug($data['name'] ?? 'cv') . '.pdf');

        }

        // fallback: show template preview
        return view('cv.templates.' . $data['template'], $data);
    }
}
