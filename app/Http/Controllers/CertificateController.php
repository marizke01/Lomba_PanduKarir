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
    $pdf = Pdf::loadView('certificates.pdf')
        ->setPaper('a4', 'landscape');

    return $pdf->download('certificate.pdf');
}

}
