{{-- resources/views/skills/index.blade.php --}}
<x-app-layout>
@php
    $activeCategory = $activeCategory ?? null;
@endphp

    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <p class="text-[11px] text-slate-500 uppercase tracking-wide">Belajar Skill</p>
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">Pelatihan SkillBridge</h2>
            <p class="text-xs text-slate-500">
                Pilih pelatihan, ikuti modulnya, kumpulkan tugas, dan bangun portofoliomu.
            </p>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- REKOMENDASI UNTUKMU --}}
            @if (!empty($recommended))
                @php $firstRec = $recommended[0]; @endphp
                <div class="bg-gradient-to-r from-indigo-600 via-indigo-500 to-sky-500 rounded-2xl shadow-lg overflow-hidden">
                    <div class="grid md:grid-cols-2">
                        <div class="p-6 sm:p-7 flex flex-col justify-center gap-3">
                            <p class="text-[11px] text-indigo-100 uppercase tracking-wide">Rekomendasi untukmu</p>
                            <h3 class="text-lg sm:text-xl font-semibold text-white">Mulai dari pelatihan yang kami sarankan</h3>
                            <p class="text-xs text-indigo-100">
                                Pelatihan ini cocok sebagai langkah awal untuk membangun skill dasar sebelum lanjut ke materi yang lebih kompleks.
                            </p>

                            <a href="{{ route('skills.show', $firstRec['slug']) }}"
                               class="inline-flex items-center mt-2 px-4 py-2 rounded-xl bg-white text-xs font-medium text-indigo-700 shadow-sm hover:bg-indigo-50">
                                Lihat pelatihan rekomendasi
                                <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 12h14M13 6l6 6-6 6"/>
                                </svg>
                            </a>
                        </div>

                        <div class="relative hidden md:block">
                            <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/60 to-transparent z-10"></div>

                            @if (!empty($firstRec['thumbnail']))
                                <img
                                    src="{{ $firstRec['thumbnail'] }}"
                                    onerror="this.onerror=null;this.src='{{ str_replace('maxresdefault','hqdefault',$firstRec['thumbnail']) }}';"
                                    alt="Thumbnail rekomendasi"
                                    class="h-full w-full object-cover opacity-90"
                                >
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            {{-- FILTER --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4 space-y-3">
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <p class="text-xs text-slate-600">Filter pelatihan berdasarkan kategori</p>
                    <a href="{{ route('skills.index') }}" class="text-[11px] text-slate-500 hover:text-indigo-600">
                        Reset filter
                    </a>
                </div>

                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('skills.index') }}"
                       class="px-3 py-1.5 rounded-full border text-[12px]
                        {{ !$activeCategory ? 'bg-indigo-50 text-indigo-700 border-indigo-100' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-50' }}">
                        Semua
                    </a>

                    <a href="{{ route('skills.index', ['category' => 'Teknologi']) }}"
                       class="px-3 py-1.5 rounded-full border text-[12px]
                        {{ $activeCategory === 'Teknologi' ? 'bg-indigo-50 text-indigo-700 border-indigo-100' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-50' }}">
                        Teknologi
                    </a>

                    <a href="{{ route('skills.index', ['category' => 'Desain']) }}"
                       class="px-3 py-1.5 rounded-full border text-[12px]
                        {{ $activeCategory === 'Desain' ? 'bg-violet-600 text-white border-violet-600' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-50' }}">
                        Desain
                    </a>

                    <a href="{{ route('skills.index', ['category' => 'Marketing']) }}"
                       class="px-3 py-1.5 rounded-full border text-[12px]
                        {{ $activeCategory === 'Marketing' ? 'bg-violet-600 text-white border-violet-600' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-50' }}">
                        Marketing
                    </a>
                </div>
            </div>

            {{-- DAFTAR PELATIHAN --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse ($courses as $course)
                    <a href="{{ route('skills.show', $course['slug']) }}"
                       class="group bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">
                        {{-- Thumbnail: rapi, tidak zoom berlebihan --}}
                        <div class="w-full aspect-[16/9] bg-slate-100 overflow-hidden">
                            <img
                                src="{{ $course['thumbnail'] ?? '' }}"
                                onerror="this.onerror=null;this.src='{{ str_replace('maxresdefault','hqdefault',$course['thumbnail'] ?? '') }}';"
                                alt="Thumbnail {{ $course['title'] }}"
                                class="w-full h-full object-cover object-center group-hover:scale-[1.02] transition duration-300"
                            >
                        </div>

                        <div class="p-4 flex flex-col flex-1">
                            <div class="flex items-center gap-2 mb-2 flex-wrap">
                                <span class="text-[11px] px-2 py-0.5 rounded-full bg-slate-50 text-slate-600 border border-slate-100">
                                    {{ $course['category'] }}
                                </span>

                                <span class="text-[11px] px-2 py-0.5 rounded-full bg-violet-50 text-violet-700">
                                    {{ $course['level'] }}
                                </span>

                                {{-- BADGE SUDAH DIKERJAKAN --}}
                                @if(in_array($course['slug'], $completedCourseSlugs ?? []))
                                    <span class="text-[11px] px-2 py-0.5 rounded-full
                                                bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        ✓ Sudah dikerjakan
                                    </span>
                                @endif
                            </div>


                            <h3 class="text-sm font-semibold text-slate-900 mb-1 group-hover:text-indigo-700 leading-snug">
                                {{ $course['title'] }}
                            </h3>
                            <p class="text-[12px] text-slate-500 line-clamp-2 mb-3">
                                {{ $course['description'] ?? 'Pelatihan ini dirancang untuk membangun skill dari dasar.' }}
                            </p>

                            <div class="mt-auto flex items-center justify-between text-[11px] text-slate-500 pt-2">
                                <span>
                                    {{ $course['video_count'] ?? collect($course['modules'] ?? [])->where('type','video')->count() }}
                                    video · {{ $course['duration'] ?? '—' }}
                                </span>
                                <span class="text-indigo-600 font-medium">Lihat detail →</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-xs text-slate-500">Belum ada pelatihan dengan filter ini.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
