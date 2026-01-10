{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                Dashboard SkillBridge
            </h2>
            <p class="text-xs text-gray-500">
                Ringkasan perjalanan belajarmu: pelatihan, project, portofolio, dan sertifikat.
            </p>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-b from-slate-50 to-slate-100">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- HERO CARD --}}
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-600 via-indigo-500 to-sky-500 shadow-lg">
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-indigo-300/40 blur-2xl"></div>
                <div class="absolute -left-10 -bottom-10 h-32 w-32 rounded-full bg-sky-300/40 blur-2xl"></div>

                <div class="relative px-6 py-6 sm:px-8 sm:py-7 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <p class="text-xs text-indigo-100 mb-1">
                            Selamat datang kembali,
                        </p>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white mb-2">
                            {{ Auth::user()->name }} 👋
                        </h3>
                        <p class="text-xs sm:text-sm text-indigo-100 max-w-md">
                            Saatnya lanjut bangun skill, kumpulkan project simulasi, dan lengkapi portofoliomu.
                            Semua langkah kecilmu di sini akan jadi bekal besar di dunia kerja nanti.
                        </p>
                    </div>

                    <div class="flex flex-col items-start md:items-end gap-2">
                        <div class="flex items-center gap-2 text-xs text-indigo-100 bg-white/10 px-3 py-1.5 rounded-full border border-indigo-300/40">
                            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                            <span>Progress awal · tahap eksplorasi</span>
                        </div>
                        <button
                            class="mt-1 inline-flex items-center px-4 py-2 rounded-xl bg-white text-xs sm:text-sm font-medium text-indigo-700 shadow-sm hover:bg-indigo-50">
                            Mulai langkah pertamamu
                            <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                      d="M5 12h14M13 6l6 6-6 6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- STAT CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Pelatihan --}}
                <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-sm p-4 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-9 w-9 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 4h14v12H5z" stroke="currentColor" stroke-width="1.6"/>
                                    <path d="M5 10h14" stroke="currentColor" stroke-width="1.6"/>
                                    <path d="M9 19h6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Pelatihan diikuti</p>
                                <p class="text-2xl font-semibold text-slate-900">0</p>
                            </div>
                        </div>
                        <span class="text-[11px] px-2 py-1 rounded-full bg-indigo-50 text-indigo-700">
                            Belum dimulai
                        </span>
                    </div>
                    <p class="text-xs text-slate-500">
                        Nanti di sini akan muncul jumlah pelatihan skill yang kamu ikuti.
                    </p>
                </div>

                {{-- Project Lab --}}
                <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-sm p-4 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-9 w-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 7h16v11H4z" stroke="currentColor" stroke-width="1.6"/>
                                    <path d="M8 7V5h8v2" stroke="currentColor" stroke-width="1.6"/>
                                    <path d="M9 11h3v4H9zM13 11h3v4h-3z" stroke="currentColor" stroke-width="1.6"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Project Lab</p>
                                <p class="text-2xl font-semibold text-slate-900">0</p>
                            </div>
                        </div>
                        <span class="text-[11px] px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">
                            Mulai
                        </span>
                    </div>
                    <p class="text-xs text-slate-500">
                        Di sini nanti adalah jumlah proyek simulasi (mirip freelance) yang sudah kamu kerjakan.
                    </p>
                </div>


                {{-- Portfolio --}}
                <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-sm p-4 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-9 w-9 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 4h16v16H4z" stroke="currentColor" stroke-width="1.6"/>
                                    <path d="M8 8h8v8H8z" stroke="currentColor" stroke-width="1.6"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Portofolio</p>
                                <p class="text-2xl font-semibold text-slate-900">
                                    {{ $portfolioCount ?? 0 }}
                                </p>
                            </div>
                        </div>
                        @auth
                        <a href="{{ route('portfolio.index') }}"
                        class="text-[11px] px-2 py-1 rounded-full bg-sky-50 text-sky-700">
                            Lihat
                        </a>
                        @endauth
                    </div>
                    <p class="text-xs text-slate-500">
                        Project Lab yang sudah selesai otomatis masuk ke portofoliomu.
                    </p>
                </div>



                {{-- Sertifikat --}}
                <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-sm p-4 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-9 w-9 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 3 5 9l7 12 7-12-7-6Z" stroke="currentColor" stroke-width="1.6"/>
                                    <path d="M12 9v4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    <circle cx="12" cy="15" r="0.8" fill="currentColor"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Sertifikat</p>
                                <p class="text-2xl font-semibold text-slate-900">0</p>
                            </div>
                        </div>
                        <span class="text-[11px] px-2 py-1 rounded-full bg-amber-50 text-amber-700">
                            Menunggu progress
                        </span>
                    </div>
                    <p class="text-xs text-slate-500">
                        Setelah melengkapi pelatihan dan project, sertifikatmu akan muncul di sini.
                    </p>
                </div>
            </div>

            {{-- GRID: PROGRESS + QUICK ACTIONS + ROADMAP --}}
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
                {{-- Progress belajar & info --}}
                <div class="xl:col-span-2 space-y-4">
                    <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-sm p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <h3 class="text-sm font-semibold text-slate-900">
                                    Progress Belajar Terbaru
                                </h3>
                                <p class="text-xs text-slate-500">
                                    Nantinya, bagian ini akan menampilkan pelatihan yang sedang kamu ikuti.
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-[11px] bg-slate-100 text-slate-600">
                                Prototype tahap awal
                            </span>
                        </div>

                        <div class="border border-dashed border-slate-200 rounded-xl p-4 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                            <div>
                                <p class="text-xs uppercase tracking-wide text-slate-500 mb-1">
                                    Belum ada pelatihan aktif
                                </p>
                                <p class="text-sm text-slate-700">
                                    Kamu belum memulai pelatihan apapun. Mulai dari satu skill dulu, misalnya
                                    <span class="font-semibold text-indigo-600">Web Development Dasar</span> atau
                                    <span class="font-semibold text-indigo-600">UI/UX Pemula</span>.
                                </p>
                            </div>
                            <a href="#"
                               class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-indigo-600 text-white text-xs font-medium hover:bg-indigo-700">
                                Jelajahi pelatihan skill
                            </a>
                        </div>
                    </div>

                    <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900 mb-2">
                            Roadmap SkillBridge-mu
                        </h3>
                        <p class="text-xs text-slate-500 mb-3">
                            Gambaran langkah-langkah yang akan kamu lalui di platform ini.
                        </p>
                        <div class="grid sm:grid-cols-2 gap-3 text-xs text-slate-700">
                            <div class="flex gap-3">
                                <div class="mt-0.5 h-6 w-6 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-[11px]">
                                    1
                                </div>
                                <div>
                                    <p class="font-semibold">Lengkapi profil & minat skill.</p>
                                    <p class="text-slate-500 mt-0.5">
                                        Supaya rekomendasi pelatihan dan project-mu lebih relevan.
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="mt-0.5 h-6 w-6 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-[11px]">
                                    2
                                </div>
                                <div>
                                    <p class="font-semibold">Ikuti pelatihan pertama.</p>
                                    <p class="text-slate-500 mt-0.5">
                                        Mulai dari skill dasar yang paling kamu butuhkan.
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="mt-0.5 h-6 w-6 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-[11px]">
                                    3
                                </div>
                                <div>
                                    <p class="font-semibold">Kerjakan Project Lab.</p>
                                    <p class="text-slate-500 mt-0.5">
                                        Simulasi proyek seperti freelance, hasilnya untuk portofolio.
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="mt-0.5 h-6 w-6 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-[11px]">
                                    4
                                </div>
                                <div>
                                    <p class="font-semibold">Bangun portofolio, CV, dan sertifikat.</p>
                                    <p class="text-slate-500 mt-0.5">
                                        Siap dipakai melamar magang atau kerja setelah lulus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quick actions + tips --}}
                <div class="space-y-4">
                    <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900 mb-3">
                            Aksi cepat
                        </h3>
                        <div class="space-y-2 text-sm">
                            <a href="{{ route('skills.index') }}"
                                class="flex items-center justify-between px-3 py-2 rounded-xl border border-slate-100 hover:bg-slate-50">
                                <div>
                                    <p class="font-medium text-slate-800">Belajar Skill</p>
                                    <p class="text-[11px] text-slate-500">Lihat daftar pelatihan</p>
                                </div>
                                <span class="text-xs text-slate-400">Mulai</span>
                            </a>
                            <a href="{{ route('projectlab.index') }}"
                               class="flex items-center justify-between px-3 py-2 rounded-xl border border-slate-100 hover:bg-slate-50">
                                <div>
                                    <p class="font-medium text-slate-800">Project Lab</p>
                                    <p class="text-[11px] text-slate-500">Proyek simulasi seperti freelance</p>
                                </div>
                                <span class="text-xs text-slate-400">Mulai</span>
                            </a>
                            <a href="{{ route('portfolio.index') }}"
                               class="flex items-center justify-between px-3 py-2 rounded-xl border border-slate-100 hover:bg-slate-50">
                                <div>
                                    <p class="font-medium text-slate-800">Portofolio</p>
                                    <p class="text-[11px] text-slate-500">Kumpulkan hasil karyamu</p>
                                </div>
                                <span class="text-xs text-slate-400">Lihat</span>
                            </a>
                            <a href="{{ route('certificates.index') }}"
                               class="flex items-center justify-between px-3 py-2 rounded-xl border border-slate-100 hover:bg-slate-50">
                                <div>
                                    <p class="font-medium text-slate-800">Sertifikat</p>
                                    <p class="text-[11px] text-slate-500">Download sertifikat digital</p>
                                </div>
                                <span class="text-xs text-slate-400">Lihat</span>
                            </a>
                            <a href="{{ route('cv.index') }}"
                            class="flex items-center justify-between px-3 py-2 rounded-xl border border-slate-100 hover:bg-slate-50">
                                <div>
                                    <p class="font-medium text-slate-800">CV Builder</p>
                                    <p class="text-[11px] text-slate-500">Buat CV profesional</p>
                                </div>
                                <span class="text-xs text-slate-400">Baru</span>
                            </a>

                        </div>
                    </div>

                    <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900 mb-2">
                            Tips memulai
                        </h3>
                        <ul class="list-disc list-inside text-xs text-slate-600 space-y-1">
                            <li>Pilih satu skill utama dulu, misalnya Web Dev atau Desain.</li>
                            <li>Atur jadwal rutin belajar 30–60 menit per hari.</li>
                            <li>Simpan semua hasil project-mu dengan rapi dan konsisten.</li>
                            <li>Gunakan CV & portofolio dari SkillBridge saat melamar magang.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
