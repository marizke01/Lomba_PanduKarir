<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;



class CVController extends Controller
{

public function downloadPDF()
{
    ini_set('max_execution_time', '180');
    set_time_limit(180);

    $cv = CV::where('user_id', auth()->id())->first();

    if (!$cv) {
        return redirect()->back()->with('error', 'CV tidak ditemukan.');
    }

    // Render blade ke HTML string
    $html = view('cv.show', compact('cv'))->render();

    $pdfPath = storage_path('app/public/cv' . auth()->id() . '.pdf');

    // Generate PDF 100% sama dengan show.blade
    Browsershot::html($html)
    ->setChromePath('/usr/bin/chromium')
    ->setOption('args', ['--no-sandbox'])
    ->timeout(180)
    ->setOption('protocolTimeout', 180000)
    ->emulateMedia('screen')
    ->showBackground()
    ->format('A4')
    ->windowSize(1200, 2000)
    ->scale(0.90)
    ->margins(15, 15, 15, 15)
    ->save($pdfPath);


    return response()->download($pdfPath)->deleteFileAfterSend(true);
}


        public function show()
    {
        $cv = CV::where('user_id', auth()->id())->first();

        if (!$cv) {
            return redirect()->route('cv.index')->with('error', 'Lengkapi CV terlebih dahulu.');
        }

        return view('cv.show', compact('cv'));
    }


    public function index()
    {
        // Ambil CV milik user
        $cv = CV::where('user_id', auth()->id())->first();

        return view('cv.index', compact('cv'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'about' => 'nullable|string',
            'hobbies' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'position' => 'nullable|string',


            'education' => 'nullable|array',
            'education.*.school' => 'nullable|string',
            'education.*.major' => 'nullable|string',
            'education.*.year' => 'nullable|string',

            'experience' => 'nullable|array',
            'experience.*.title' => 'nullable|string',
            'experience.*.desc' => 'nullable|string',
            'experience.*.year' => 'nullable|string',

            'skills' => 'nullable|array',
            'skills.*' => 'nullable|string',

            'links' => 'nullable|array',
            'links.*' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('cv_photos', 'public');
                $data['photo_url'] = 'storage/' . $path;
            }
            


        // Simpan/update CV
        CV::updateOrCreate(
            ['user_id' => auth()->id()],
            $data
        );

        return back()->with('success', 'CV berhasil disimpan!');
    }
}
