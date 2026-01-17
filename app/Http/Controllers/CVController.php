<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CVController extends Controller
{
    /**
     * Tampilkan form CV builder
     */
    public function index()
    {
        $cv = CV::where('user_id', auth()->id())->first();
        return view('cv.index', compact('cv'));
    }

    /**
     * Simpan/update data CV
     */
    public function store(Request $request)
    {
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

        // Tambahkan nama dan email dari user
        $data['name'] = auth()->user()->name;
        $data['email'] = auth()->user()->email;

        // Upload photo jika ada
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('cv_photos', 'public');
            $data['photo_url'] = 'storage/' . $path;
        }

        // Simpan/update CV
        CV::updateOrCreate(
            ['user_id' => auth()->id()],
            $data
        );

        return redirect()->route('cv.preview')->with('success', 'CV berhasil disimpan!');
    }

    /**
     * Tampilkan preview CV
     */
    public function preview()
    {
        $cv = CV::where('user_id', auth()->id())->first();

        if (!$cv) {
            return redirect()->route('cv.index')->with('error', 'Silakan lengkapi data CV terlebih dahulu.');
        }

        return view('cv.show', compact('cv'));
    }

    /**
     * Download CV sebagai PDF
     */
    public function downloadPDF()
    {
        $cv = CV::where('user_id', auth()->id())->first();

        if (!$cv) {
            return redirect()->route('cv.index')->with('error', 'CV tidak ditemukan. Silakan buat CV terlebih dahulu.');
        }

        $pdf = Pdf::loadView('cv.pdf', compact('cv'));
        return $pdf->download('CV-' . auth()->user()->name . '.pdf');
    }
}