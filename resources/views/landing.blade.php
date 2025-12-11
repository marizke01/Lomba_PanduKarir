{{-- resources/views/landing.blade.php --}}
@extends('layouts.app')

@section('title', 'SkillBridge - Jembatan dari SMK ke Dunia Kerja')

@section('content')
    {{-- HERO SECTION --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-sky-50">
        <div class="absolute -top-24 -right-32 h-64 w-64 rounded-full bg-indigo-200/40 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-32 h-64 w-64 rounded-full bg-sky-200/40 blur-3xl"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                {{-- KIRI: TEKS --}}
                <div>
                    <div class="inline-flex items-center gap-2 bg-white/80 border border-indigo-100 text-xs text-slate-600 px-3 py-1 rounded-full shadow-sm mb-4">
                        <span class="inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                        <span>Dirancang untuk siswa SMA/SMK yang ingin siap kerja</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight text-slate-900 mb-4">
                        Dari bangku <span class="text-indigo-600">SMK</span><br>
                        ke dunia kerja, lewat satu jembatan.
                    </h1>

                    <p class="text-base sm:text-lg text-slate-600 mb-6 max-w-xl">
                        SkillBridge membantumu belajar skill kerja, mengerjakan proyek simulasi seperti freelance,
                        membangun portofolio, dan membuat CV + sertifikat otomatis untuk melamar magang atau kerja.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3 mb-6">
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-medium shadow-sm hover:bg-indigo-700">
                            Mulai Gratis
                            <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                      d="M5 12h14M13 6l6 6-6 6"/>
                            </svg>
                        </a>
                        <a href="#cara-kerja"
                           class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium text-slate-700 hover:bg-slate-50">
                            Lihat cara kerja
                        </a>
                    </div>

                    <div class="flex flex-wrap gap-3 text-xs text-slate-500">
                        <div class="inline-flex items-center gap-1.5">
                            <span class="h-5 w-5 rounded-full bg-indigo-100 flex items-center justify-center text-[10px] text-indigo-700">CV</span>
                            <span>CV & portofolio otomatis dari project</span>
                        </div>
                        <div class="inline-flex items-center gap-1.5">
                            <span class="h-5 w-5 rounded-full bg-emerald-100 flex items-center justify-center text-[10px] text-emerald-700">✔</span>
                            <span>Sertifikat setelah pelatihan & project</span>
                        </div>
                        <div class="inline-flex items-center gap-1.5">
                            <span class="h-5 w-5 rounded-full bg-sky-100 flex items-center justify-center text-[10px] text-sky-700">SMK</span>
                            <span>Cocok untuk RPL, TKJ, DKV, dan lainnya</span>
                        </div>
                    </div>
                </div>

                {{-- KANAN: PREVIEW DASHBOARD --}}
                <div class="relative">
                    <div class="relative bg-white/90 border border-slate-200 rounded-2xl shadow-lg p-4 sm:p-5 space-y-4">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <p class="text-[11px] text-slate-500">Dashboard siswa</p>
                                <p class="text-sm font-semibold text-slate-900">Halo, Fira 👋</p>
                            </div>
                            <span class="inline-flex items-center gap-1 text-[11px] px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Ready to learn
                            </span>
                        </div>

                        <div class="space-y-3">
                            <div class="border border-slate-100 rounded-xl p-3">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <p class="text-[11px] text-slate-500">Progress pelatihan</p>
                                        <p class="text-xs font-medium text-slate-900">Web Development Dasar</p>
                                    </div>
                                    <span class="text-[11px] font-medium text-indigo-700 bg-indigo-50 px-2 py-0.5 rounded-full">
                                        60% selesai
                                    </span>
                                </div>
                                <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full w-3/5 bg-gradient-to-r from-indigo-500 to-sky-400 rounded-full"></div>
                                </div>
                                <p class="mt-2 text-[11px] text-slate-500">
                                    4 dari 6 video selesai · 1 modul lagi sebelum ambil Project Lab pertama.
                                </p>
                            </div>

                            <div class="grid grid-cols-3 gap-3 text-center">
                                <div class="rounded-xl border border-slate-100 bg-slate-50/60 px-2.5 py-2">
                                    <p class="text-[11px] text-slate-500 mb-1">Pelatihan</p>
                                    <p class="text-lg font-semibold text-slate-900">1</p>
                                </div>
                                <div class="rounded-xl border border-slate-100 bg-slate-50/60 px-2.5 py-2">
                                    <p class="text-[11px] text-slate-500 mb-1">Proyek</p>
                                    <p class="text-lg font-semibold text-slate-900">0</p>
                                </div>
                                <div class="rounded-xl border border-slate-100 bg-slate-50/60 px-2.5 py-2">
                                    <p class="text-[11px] text-slate-500 mb-1">Sertifikat</p>
                                    <p class="text-lg font-semibold text-slate-900">0</p>
                                </div>
                            </div>

                            <div class="border border-slate-100 rounded-xl p-3 bg-slate-50/70">
                                <p class="text-[11px] text-slate-500 mb-2">Langkah berikutnya</p>
                                <ol class="space-y-1.5 text-[11px] text-slate-600">
                                    <li>1. Selesaikan modul pelatihan yang tersisa</li>
                                    <li>2. Ambil Project Lab sebagai simulasi freelance</li>
                                    <li>3. Bangun portofolio & dapatkan sertifikat</li>
                                </ol>
                            </div>
                        </div>

                        <p class="text-[10px] text-slate-400">
                            *Ilustrasi tampilan. UI dapat berubah sesuai pengembangan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FITUR UTAMA --}}
    <section id="fitur" class="py-10 lg:py-14 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl sm:text-3xl font-semibold text-slate-900 mb-2">
                    Fitur utama SkillBridge
                </h2>
                <p class="text-sm sm:text-base text-slate-600 max-w-2xl mx-auto">
                    Semua yang kamu butuhkan untuk mempersiapkan diri dari bangku sekolah menuju dunia kerja.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                    <div class="h-10 w-10 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center mb-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M5 4h14v12H5z" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M5 10h14" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M9 19h6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900 mb-1.5">Pelatihan Skill</h3>
                    <p class="text-xs text-slate-600">
                        Video singkat dan terarah untuk skill kerja: web dev, desain, copywriting, dan lainnya.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                    <div class="h-10 w-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M4 7h16v11H4z" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M8 7V5h8v2" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M9 11h3v4H9zM13 11h3v4h-3z" stroke="currentColor" stroke-width="1.6"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900 mb-1.5">Project Lab</h3>
                    <p class="text-xs text-slate-600">
                        Project simulasi seperti freelance untuk latihan dan menambah pengalaman di CV & portofolio.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                    <div class="h-10 w-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center mb-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M7 4h10v16H7z" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M9 8h6M9 11h4M9 15h3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900 mb-1.5">CV & Portofolio Otomatis</h3>
                    <p class="text-xs text-slate-600">
                        Project yang kamu selesaikan otomatis tersusun menjadi portofolio dan isi CV-mu.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                    <div class="h-10 w-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center mb-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M12 3 5 9l7 12 7-12-7-6Z" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M12 9v4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            <circle cx="12" cy="15" r="0.8" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900 mb-1.5">Sertifikat Digital</h3>
                    <p class="text-xs text-slate-600">
                        Dapatkan sertifikat setiap menyelesaikan pelatihan dan project tertentu untuk penguat lamaranmu.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CARA KERJA --}}
    <section id="cara-kerja" class="py-10 lg:py-14 bg-slate-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-semibold text-slate-900 mb-3">
                        Bagaimana SkillBridge bekerja?
                    </h2>
                    <p class="text-sm sm:text-base text-slate-600 mb-5">
                        Perjalananmu disusun dari nol sampai siap melamar magang atau kerja.
                    </p>

                    <ol class="space-y-3 text-sm">
                        <li class="flex gap-3">
                            <div class="mt-0.5 flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 text-[11px] text-white">
                                1
                            </div>
                            <div>
                                <p class="font-semibold text-slate-900">Pilih jurusan & skill yang ingin kamu kuasai.</p>
                                <p class="text-slate-600 text-xs mt-0.5">
                                    Sesuaikan dengan jurusan di sekolah atau minat karier yang kamu inginkan.
                                </p>
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <div class="mt-0.5 flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 text-[11px] text-white">
                                2
                            </div>
                            <div>
                                <p class="font-semibold text-slate-900">Ikuti pelatihan skill berbasis video.</p>
                                <p class="text-slate-600 text-xs mt-0.5">
                                    Materi singkat yang fokus pada skill yang benar-benar dipakai di dunia kerja.
                                </p>
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <div class="mt-0.5 flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 text-[11px] text-white">
                                3
                            </div>
                            <div>
                                <p class="font-semibold text-slate-900">Ambil Project Lab sebagai simulasi freelance.</p>
                                <p class="text-slate-600 text-xs mt-0.5">
                                    Kerjakan project nyata versi latihan: landing page UMKM, poster event, konten produk, dll.
                                </p>
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <div class="mt-0.5 flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 text-[11px] text-white">
                                4
                            </div>
                            <div>
                                <p class="font-semibold text-slate-900">Bangun portofolio, CV, dan sertifikat.</p>
                                <p class="text-slate-600 text-xs mt-0.5">
                                    Semua project yang disetujui masuk ke portofolio, mengisi CV, dan membuka sertifikat digital.
                                </p>
                            </div>
                        </li>
                    </ol>

                    <a href="{{ route('register') }}"
                       class="inline-flex items-center mt-5 px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700">
                        Mulai perjalananmu sekarang
                    </a>
                </div>

                <div class="space-y-4">
                    <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                        <p class="text-[11px] text-slate-500 mb-1">Contoh langkah</p>
                        <p class="text-sm font-semibold text-slate-900 mb-1">
                            Pelatihan: Web Development Dasar
                        </p>
                        <p class="text-xs text-slate-600 mb-3">
                            6 video singkat · HTML, CSS, dan layout responsif untuk pemula.
                        </p>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-indigo-50 text-[11px] text-indigo-700">
                            Skill Tech · Beginner friendly
                        </span>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                        <p class="text-[11px] text-slate-500 mb-1">Contoh project</p>
                        <p class="text-sm font-semibold text-slate-900 mb-1">
                            Project Lab: Landing Page UMKM Kopi
                        </p>
                        <p class="text-xs text-slate-600 mb-3">
                            Bikin landing page sederhana untuk usaha kopi lokal, persis seperti tugas dari klien.
                        </p>
                        <div class="flex flex-wrap gap-2 text-[11px]">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700">
                                Masuk Portofolio
                            </span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">
                                Sertifikat saat selesai
                            </span>
                        </div>
                    </div>

                    <div class="bg-slate-900 rounded-2xl p-4 text-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-slate-300 mb-1">Output akhirnya</p>
                            <p class="text-sm font-semibold">CV & Sertifikat siap diunduh</p>
                            <p class="text-[11px] text-slate-400 mt-1">
                                Bisa dipakai untuk melamar magang, kerja part-time, atau full-time setelah lulus.
                            </p>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="h-10 w-8 rounded-md bg-slate-800 border border-slate-700 flex items-center justify-center text-[11px]">
                                CV
                            </div>
                            <div class="h-10 w-8 rounded-md bg-amber-400/20 border border-amber-300 text-amber-200 flex items-center justify-center text-[11px]">
                                Srtf
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- UNTUK SIAPA --}}
    <section id="untuk-siapa" class="py-10 lg:py-14 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl sm:text-3xl font-semibold text-slate-900 mb-2">
                    Untuk siapa SkillBridge dibuat?
                </h2>
                <p class="text-sm sm:text-base text-slate-600 max-w-2xl mx-auto">
                    Fokus kami adalah membantu pelajar dan lulusan muda yang ingin melangkah lebih cepat ke dunia kerja.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <div class="h-10 w-10 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center mb-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M5 20v-6l7-3 7 3v6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            <path d="M5 9 12 6l7 3-7 3-7-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900 mb-1.5">Siswa SMK kelas XI–XII</h3>
                    <p class="text-xs text-slate-600">
                        Yang ingin punya portofolio dan CV sebelum lulus, supaya lebih percaya diri saat ikut rekrutmen.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <div class="h-10 w-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M4 6h16v11H4z" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M8 6V4h8v2" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M9 10h6M9 13h4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900 mb-1.5">Jurusan IT & Desain</h3>
                    <p class="text-xs text-slate-600">
                        RPL, TKJ, DKV, multimedia, dan jurusan lain yang ingin mempraktikkan skill digital & kreatif.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <div class="h-10 w-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center mb-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M6 19V7l6-4 6 4v12" stroke="currentColor" stroke-width="1.6"/>
                            <path d="M10 14h4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-900 mb-1.5">Lulusan baru</h3>
                    <p class="text-xs text-slate-600">
                        Fresh graduate yang merasa CV masih kosong dan butuh penguat berupa portofolio dan sertifikat.
                    </p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <p class="text-sm text-slate-600 mb-3">
                    Siap menjembatani skill-mu ke dunia kerja?
                </p>
                <a href="{{ route('register') }}"
                   class="inline-flex items-center px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700">
                    Daftar SkillBridge Sekarang
                </a>
            </div>
        </div>
    </section>
@endsection
