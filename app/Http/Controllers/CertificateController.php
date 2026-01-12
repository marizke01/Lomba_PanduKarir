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

    $pdf = Pdf::loadView('certificates.pdf', compact('certificate'));

    $pdf->setOptions([
        'dpi' => 72,
        'defaultFont' => 'DejaVu Sans',
        'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true,
        'enable_font_subsetting' => false,
    ]);

    // A4 LANDSCAPE in POINTS (DOMPDF native)
    // 1mm = 2.83465 pt
    $pdf = Pdf::loadView('certificates.pdf', compact('certificate'))
    ->setPaper([0, 0, 841.89, 595.28], 'landscape');

    return $pdf->download(
        'Sertifikat-SkillBridge-' . $certificate->id . '.pdf'
    );
    

}

}
