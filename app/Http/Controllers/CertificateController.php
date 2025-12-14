<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;


class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('certificates.index', compact('certificates'));
    }

    public function show(Certificate $certificate)
    {
        abort_if($certificate->user_id !== Auth::id(), 403);

        return view('certificates.show', compact('certificate'));
    }

    public function download($id)
{
    $certificate = Certificate::with('user')
        ->where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $pdf = Pdf::loadView('certificates.pdf', compact('certificate'))
    ->setPaper('a4', 'landscape');


    return $pdf->download(
        'Sertifikat-SkillBridge-' . $certificate->id . '.pdf'
    );
}
}
