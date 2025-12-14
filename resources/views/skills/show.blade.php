{{-- resources/views/skills/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <p class="text-[11px] text-slate-500 uppercase tracking-wide">
                Pelatihan Skill
            </p>
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ $course['title'] }}
            </h2>
            <div class="flex flex-wrap items-center gap-2 text-[11px] text-slate-500">
                <span class="px-2 py-0.5 rounded-full bg-slate-100">
                    {{ $course['category'] }}
                </span>
                <span class="px-2 py-0.5 rounded-full bg-violet-50 text-violet-700">
                    Level: {{ $course['level'] }}
                </span>
                <span class="px-2 py-0.5 rounded-full bg-slate-100">
                    {{ $course['video_count'] ?? collect($course['modules'] ?? [])->where('type', 'video')->count() }} video · {{ $course['duration'] ?? '—' }}
                </span>


            </div>
        </div>
    </x-slot>

    @php
        // Extra bullet per pelatihan teknologi
        $extraSections = [
            'web-development-dasar' => [
                [
                    'title' => 'Yang akan kamu pelajari',
                    'items' => [
                        'Struktur dasar HTML untuk membangun halaman.',
                        'Mengatur tampilan dengan CSS (warna, font, layout).',
                        'Membuat halaman yang rapi dan responsif.',
                    ],
                ],
                [
                    'title' => 'Cocok untuk siapa?',
                    'items' => [
                        'Siswa SMA/SMK yang baru mulai belajar web.',
                        'Kamu yang ingin punya landasan kuat sebelum ke JavaScript atau Laravel.',
                    ],
                ],
                [
                    'title' => 'Setelah selesai, kamu bisa…',
                    'items' => [
                        'Membuat landing page sederhana sendiri.',
                        'Membaca dan mengedit kode HTML & CSS dengan percaya diri.',
                    ],
                ],
            ],

            'javascript-dasar' => [
                [
                    'title' => 'Yang akan kamu pelajari',
                    'items' => [
                        'Dasar sintaks JavaScript di browser.',
                        'Variabel, tipe data, dan fungsi.',
                        'Event & manipulasi DOM.',
                    ],
                ],
                [
                    'title' => 'Cocok untuk siapa?',
                    'items' => [
                        'Siswa SMA/SMK yang baru mulai ngoding.',
                        'Kamu yang sudah paham HTML & CSS dasar.',
                        'Yang pengin bikin website lebih interaktif.',
                    ],
                ],
                [
                    'title' => 'Setelah selesai, kamu bisa…',
                    'items' => [
                        'Memahami cara kerja JS di browser.',
                        'Membuat interaksi sederhana (tombol, form, dll).',
                        'Membangun mini project seperti To-Do List untuk portofolio.',
                    ],
                ],
            ],

            'mysql-dasar' => [
                [
                    'title' => 'Yang akan kamu pelajari',
                    'items' => [
                        'Konsep dasar database relasional.',
                        'Membuat database & tabel di MySQL.',
                        'Query SELECT, INSERT, UPDATE, dan DELETE.',
                    ],
                ],
                [
                    'title' => 'Cocok untuk siapa?',
                    'items' => [
                        'Siswa SMK RPL / TKJ yang ingin paham backend.',
                        'Kamu yang ingin lanjut ke Laravel / backend web.',
                    ],
                ],
                [
                    'title' => 'Setelah selesai, kamu bisa…',
                    'items' => [
                        'Mendesain tabel sederhana untuk aplikasi.',
                        'Membaca dan menulis query SQL dasar.',
                    ],
                ],
            ],

            'laravel-web-development-pemula' => [
                [
                    'title' => 'Yang akan kamu pelajari',
                    'items' => [
                        'Struktur folder & arsitektur dasar Laravel (MVC).',
                        'Routing, controller, dan Blade template untuk tampilan.',
                        'Migration & Eloquent model untuk mengelola database.',
                        'Membuat fitur CRUD sederhana (Create, Read, Update, Delete).',
                    ],
                ],
                [
                    'title' => 'Cocok untuk siapa?',
                    'items' => [
                        'Siswa SMK/SMA yang sudah mengenal PHP dasar.',
                        'Mahasiswa atau pemula yang ingin pindah dari PHP native ke framework.',
                        'Kamu yang ingin membangun aplikasi web modern dengan cara yang lebih rapi dan terstruktur.',
                    ],
                ],
                [
                    'title' => 'Setelah selesai, kamu bisa…',
                    'items' => [
                        'Membuat aplikasi web sederhana berbasis Laravel (misalnya To-Do App atau Blog).',
                        'Memahami alur request–response & konsep MVC di Laravel.',
                        'Mengembangkan fitur baru dengan percaya diri menggunakan route, controller, dan view.',
                    ],
                ],
            ],
            
        ];

        $sectionsForThisCourse = $extraSections[$course['slug']] ?? null;
    @endphp

    <div class="py-6 sm:py-8 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- PROGRESS --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 space-y-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">
                            Progress pelatihan
                        </p>
                        <p class="text-[11px] text-slate-500">
                            {{ $completedModules }} dari {{ $totalModules }} modul selesai
                        </p>
                    </div>
                    <p class="text-sm font-semibold text-violet-700">
                        {{ $progressPercent }}%
                    </p>
                </div>
                <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full bg-violet-500 rounded-full" style="width: {{ $progressPercent }}%;"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                {{-- KIRI: deskripsi + modul --}}
                <div class="lg:col-span-2 space-y-4">

                    {{-- TENTANG PELATIHAN --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                        {{-- Foto / thumbnail --}}
                        {{-- Thumbnail pelatihan (tanpa cropping, tapi tetap rapi) --}}
                       @php
                            $thumb = $course['thumbnail'] ?? '';
                            $thumbFallback = $thumb ? str_replace('maxresdefault','hqdefault',$thumb) : 'https://placehold.co/1200x600?text=SkillBridge';
                        @endphp

                        <img
                            src="{{ $thumb ?: $thumbFallback }}"
                            onerror="this.onerror=null;this.src='{{ $thumbFallback }}';"
                            alt="Thumbnail pelatihan {{ $course['title'] }}"
                            class="w-full h-full object-contain"
                        />


                        <div class="p-5 space-y-3">
                            <h3 class="text-sm font-semibold text-slate-900">
                                Tentang pelatihan ini
                            </h3>

                            <p class="text-xs text-slate-600">
                                {{ $course['description'] }}
                            </p>

                            {{-- Grid bullet kalau ada --}}
                            @if ($sectionsForThisCourse)
                                <div class="grid sm:grid-cols-3 gap-3 text-[11px] text-slate-600 mt-2">
                                    @foreach ($sectionsForThisCourse as $section)
                                        <div class="space-y-1">
                                            <p class="font-semibold text-slate-900">
                                                {{ $section['title'] }}
                                            </p>
                                            <ul class="list-disc list-inside space-y-0.5">
                                                @foreach ($section['items'] as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- DAFTAR MODUL --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-sm font-semibold text-slate-900">
                                Daftar modul
                            </h3>
                            <p class="text-[11px] text-slate-500">
                                Klik modul untuk mulai belajar.
                            </p>
                        </div>

                        <div class="space-y-2">
                            @foreach ($course['modules'] as $index => $module)
                                @php
                                    $prevCompleted = $index === 0
                                        ? true
                                        : optional($progressByModule[$index - 1] ?? null)->is_completed;

                                    $thisCompleted = optional($progressByModule[$index] ?? null)->is_completed;

                                    $isLocked = ! $prevCompleted;
                                @endphp

                                @if ($isLocked)
                                    {{-- Modul terkunci --}}
                                    <div class="flex items-start justify-between gap-3 px-3 py-2 rounded-xl bg-slate-50 border border-dashed border-slate-200 opacity-70">
                                        <div class="flex items-start gap-3">
                                            <div class="mt-1 h-6 w-6 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center text-[11px]">
                                                {{ $index + 1 }}
                                            </div>
                                            <div>
                                                <p class="text-xs font-semibold text-slate-500">
                                                    {{ $module['title'] }}
                                                </p>
                                                <p class="text-[11px] text-slate-400">
                                                    Terkunci · Selesaikan modul sebelumnya dulu
                                                </p>
                                            </div>
                                        </div>
                                        <span class="text-[11px] text-slate-400">
                                            🔒
                                        </span>
                                    </div>
                                @else
                                    {{-- Modul bisa diklik --}}
                                    <a href="{{ route('skills.module', [$course['slug'], $index]) }}"
                                    class="flex items-start justify-between gap-3 px-3 py-3 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition">
                                        <div class="flex items-start gap-3">
                                            <div class="mt-1 h-6 w-6 rounded-full {{ $thisCompleted ? 'bg-emerald-100 text-emerald-700' : 'bg-violet-100 text-violet-700' }} flex items-center justify-center text-[11px]">
                                                {{ $index + 1 }}
                                            </div>
                                            <div>
                                                <p class="text-xs font-semibold text-slate-900">
                                                    {{ $module['title'] }}
                                                </p>
                                                <p class="text-[11px] text-slate-500">
                                                    {{ ucfirst($module['type']) }} · {{ $module['duration'] }}
                                                </p>
                                                @if ($thisCompleted)
                                                    <p class="text-[11px] text-emerald-600">
                                                        ✅ Modul ini sudah kamu tandai selesai.
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <span class="text-[11px] {{ $thisCompleted ? 'text-emerald-600' : 'text-violet-600' }}">
                                            {{ $thisCompleted ? 'Selesai' : 'Buka modul →' }}
                                        </span>
                                    </a>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>

                {{-- KANAN: aksi cepat + tips --}}
                <div class="space-y-4">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900 mb-2">
                            Mulai / lanjut belajar
                        </h3>
                        <p class="text-xs text-slate-600 mb-3">
                            Disarankan mulai dari modul pertama, lalu lanjutkan urut sampai project mini di akhir.
                        </p>
                        <form method="POST" action="{{ route('skills.start', $course['slug']) }}">
                            @csrf
                            <button
                                class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl bg-violet-600 text-white text-xs font-medium hover:bg-violet-700">
                                Mulai / lanjut pelatihan
                            </button>
                        </form>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900 mb-2">
                            Tips belajar efektif
                        </h3>
                        <ul class="list-disc list-inside text-[11px] text-slate-600 space-y-1">
                            <li>Catat poin penting di buku atau note digital.</li>
                            <li>Pause video untuk mencoba sendiri di VS Code / editor.</li>
                            <li>Simpen semua hasil project untuk portofolio.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
