@extends('layouts.plain')

@section('content')

<style>
    .premium-card {
        border-radius: 22px;
        border: 1px solid rgba(255,255,255,0.4);
        background: rgba(255,255,255,0.55);
        backdrop-filter: blur(12px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: .25s ease;
    }

    .premium-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    .premium-feature {
        border-radius: 24px;
        overflow: hidden;
        height: 260px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: .3s ease;
        position: relative;
        cursor: pointer;
    }

    .premium-feature:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 32px rgba(0,0,0,0.14);
    }

    .premium-feature img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(65%);
        transition: .3s;
    }

    .premium-feature:hover img {
        filter: brightness(50%);
        transform: scale(1.05);
    }

    .premium-overlay {
        position: absolute;
        bottom: 0;
        padding: 25px;
        width: 100%;
        background: rgba(255,255,255,0.35);
        backdrop-filter: blur(6px);
        border-top: 1px solid rgba(255,255,255,0.6);
    }
</style>

<div class="container py-5">

    {{-- GREETING PREMIUM --}}
{{-- HEADER SECTION ala Skydash --}}
<div class="mb-5">

    <h1 class="fw-bold mb-1">Welcome {{ Auth::user()->name }}</h1>
    <p class="text-secondary">All systems are running smoothly! Ready to lanjutkan perjalanan karirmu?</p>

    <div class="row mt-4 g-4">

        {{-- LEFT BIG FEATURE CARD --}}
        <div class="col-md-6">
            <div class="p-4 rounded-4 shadow-sm h-100"
                 style="background: #eef2ff; border: 1px solid #dde3ff;">

                <div class="row h-100">
                    <div class="col-md-7 d-flex flex-column justify-content-center">
                        <h3 class="fw-bold mb-2">Tetap Produktif 🚀</h3>
                        <p class="text-secondary small mb-3">
                            Lengkapi CV dan portofolio untuk meningkatkan peluang kerja kamu.
                        </p>

                        <a href="{{ route('cv.index') }}" class="btn btn-primary">CV Builder</a>
                    </div>

                    <div class="col-md-5 text-center d-flex align-items-center">
                        <img src="{{ asset('img/fitur/magang.jpg') }}"
                             class="img-fluid"
                             style="max-height: 160px;">
                    </div>
                </div>

            </div>
        </div>

        {{-- RIGHT STAT CARDS --}}
        <div class="col-md-6">

            <div class="row g-4">

                <div class="col-md-6">
                    <div class="p-4 rounded-4 text-white shadow-sm h-100"
                         style="background: #6c8efb;">
                        <p class="small opacity-75">CV Dibuat</p>
                        <h3 class="fw-bold mb-0">0</h3>
                        <small class="opacity-75">30 days</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4 rounded-4 text-white shadow-sm h-100"
                         style="background: #4e54d3;">
                        <p class="small opacity-75">Template Tersedia</p>
                        <h3 class="fw-bold mb-0">12</h3>
                        <small class="opacity-75">Updated</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4 rounded-4 text-white shadow-sm h-100"
                         style="background: #ff6e6c;">
                        <p class="small opacity-75">Progress Profil</p>
                        <h3 class="fw-bold mb-0">70%</h3>
                        <small class="opacity-75">Goal</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4 rounded-4 text-white shadow-sm h-100"
                         style="background: #fdbb2d;">
                        <p class="small opacity-75">XP Poin</p>
                        <h3 class="fw-bold mb-0">120</h3>
                        <small class="opacity-75">New</small>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>


{{-- CTA STRIP PREMIUM --}}
<div class="p-5 rounded-4 text-white mb-5 shadow"
     style="background: linear-gradient(135deg, #6a11cb, #2575fc);">

    <div class="row align-items-center">
        <div class="col-md-8">
            <h3 class="fw-bold mb-2">
                Siap meningkatkan kesempatan kerjamu?
            </h3>
            <p class="opacity-75 small mb-0">
                Lengkapi semua bagian profil untuk hasil terbaik.
            </p>
        </div>

        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="/profile" class="btn btn-light fw-bold rounded-pill px-4">
                Lengkapi Profil
            </a>
        </div>
    </div>

</div>


    {{-- FITUR --}}
    <h2 class="fw-bold fs-3 mb-4">Lanjutkan Karir Kamu</h2>

    <div class="row g-4">

        @php
        $fitur = [
            ['title' => 'CV Builder', 'desc' => 'Template ATS + export PDF', 'img' => 'CV-1.jpg', 'link' => '/cv'],
            ['title' => 'Portofolio Digital', 'desc' => 'Kumpulkan hasil kerja terbaikmu', 'img' => 'fitur1.jpg', 'link' => '/portfolio'],
            ['title' => 'Learning Module', 'desc' => 'Belajar skill kerja dari dasar', 'img' => 'fitur2.jpg', 'link' => '/courses'],
            ['title' => 'Simulasi Interview', 'desc' => 'Latihan interview HRD & posisi kerja', 'img' => 'interview.jpg', 'link' => '/interview'],
            ['title' => 'Magang & Freelance', 'desc' => 'Tantangan project nyata untuk pengalaman kerja', 'img' => 'magang.jpg', 'link' => '/projects'],
            ['title' => 'Job Matching', 'desc' => 'Lowongan kerja sesuai minat & skill', 'img' => 'job.jpg', 'link' => '/jobs'],
        ];
        @endphp

        @foreach ($fitur as $f)
        <div class="col-md-4">
            <a href="{{ $f['link'] }}" class="text-decoration-none">
                <div class="premium-feature">

                    <img src="{{ asset('img/fitur/' . $f['img']) }}">

                    <div class="premium-overlay">
                        <h4 class="fw-bold text-dark mb-1">{{ $f['title'] }}</h4>
                        <p class="text-dark small mb-0">{{ $f['desc'] }}</p>
                    </div>

                </div>
            </a>
        </div>
        @endforeach

    </div>

</div>

@endsection
