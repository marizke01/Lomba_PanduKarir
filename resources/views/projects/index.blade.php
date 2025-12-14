<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <p class="text-[11px] text-slate-500 uppercase tracking-wide">Project Lab</p>
            <h2 class="font-semibold text-xl text-slate-900 leading-tight">Latihan Project Nyata</h2>
            <p class="text-xs text-slate-500">
                Pilih project, kerjakan deliverables, kumpulkan hasil, dan masukin ke portofolio.
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-6 sm:py-8 space-y-5">

            {{-- Banner --}}
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
                <div class="p-5 sm:p-6 bg-gradient-to-r from-violet-600 via-indigo-600 to-sky-500">
                    <p class="text-[11px] text-white/80 uppercase tracking-wide">Siap naik level?</p>
                    <h3 class="text-lg sm:text-xl font-semibold text-white">
                        Kerjakan project yang bisa dipakai untuk portofolio
                    </h3>
                    <p class="text-xs text-white/80 mt-1">
                        Fokus ke hasil: link, file, atau screenshot. Cocok buat pemula.
                    </p>
                </div>

                <div class="p-4 sm:p-5 flex flex-wrap items-center justify-between gap-2">
                    <p class="text-xs text-slate-600">
                        Total project tersedia:
                        <span class="font-semibold text-slate-900">{{ count($projects ?? []) }}</span>
                    </p>

                    <a href="{{ route('projectlab.index') }}"
                       class="text-[11px] text-slate-500 hover:text-violet-700">
                        Reset
                    </a>
                </div>
            </div>

            {{-- Filter/Search (rapi & aman) --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4 sm:p-5">
                <form method="GET" action="{{ route('projectlab.index') }}" class="space-y-3">
                    <div>
                        {{-- Search --}}
                        <div>
                            <label class="block text-[11px] text-slate-600 mb-1">Cari project</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔎</span>
                                <input
                                    type="text"
                                    name="q"
                                    value="{{ request('q') }}"
                                    placeholder="Contoh: landing page, poster, caption…"
                                    class="w-full pl-9 pr-3 py-2.5 text-[12px] rounded-xl border border-slate-200
                                           focus:outline-none focus:ring-2 focus:ring-violet-200 focus:border-violet-400 bg-white"
                                />

                                <button
                                    type="submit"
                                    class="absolute right-1.5 top-[7px] items-center justify-center px-20 py-2 rounded-xl bg-violet-600 text-white text-xs font-medium hover:bg-violet-700">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>

                    <p class="text-[11px] text-slate-500">
                        Tips: pilih yang paling relevan dengan skill yang sedang kamu pelajari.
                    </p>
                </form>
            </div>

            {{-- Grid project --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse(($projects ?? []) as $p)
                    @php
                        $thumb = $p['thumbnail'] ?? '';
                        $fallback = $p['fallback_thumbnail'] ?? 'https://placehold.co/1200x675?text=Project+Lab';
                    @endphp

                    <a href="{{ route('projectlab.show', $p['slug']) }}"
                       class="group bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">

                        {{-- Thumbnail --}}
                        <div class="relative aspect-[16/9] bg-slate-100 overflow-hidden">
                            <img
                                src="{{ $thumb ?: $fallback }}"
                                onerror="this.onerror=null;this.src='{{ $fallback }}';"
                                referrerpolicy="no-referrer"
                                loading="lazy"
                                decoding="async"
                                alt="Thumbnail {{ $p['title'] ?? 'Project' }}"
                                class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-300"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>

                            <div class="absolute bottom-3 left-3 right-3 flex items-end justify-between gap-2">
                                <div class="min-w-0">
                                    <p class="text-[11px] text-white/80">
                                        {{ $p['company_name'] ?? 'Project' }}
                                    </p>
                                    <p class="text-sm font-semibold text-white leading-snug line-clamp-2">
                                        {{ $p['title'] ?? 'Untitled' }}
                                    </p>
                                </div>
                                <span class="shrink-0 text-[11px] px-2 py-1 rounded-full bg-white/90 text-slate-900">
                                    {{ $p['difficulty'] ?? '—' }}
                                </span>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="p-4 flex flex-col flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span class="text-[11px] px-2 py-0.5 rounded-full bg-slate-100 text-slate-700">
                                    {{ $p['category'] ?? 'Umum' }}
                                </span>
                                @if(!empty($p['estimated_duration']))
                                    <span class="text-[11px] px-2 py-0.5 rounded-full bg-violet-50 text-violet-700">
                                        ⏱ {{ $p['estimated_duration'] }}
                                    </span>
                                @endif
                            </div>

                            <p class="text-[12px] text-slate-600 line-clamp-3">
                                {{ $p['short_description'] ?? '-' }}
                            </p>

                            @if(!empty($p['skills_tags']) && is_array($p['skills_tags']))
                                <div class="mt-3 flex flex-wrap gap-1.5">
                                    @foreach(array_slice($p['skills_tags'], 0, 4) as $tag)
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-slate-50 border border-slate-200 text-slate-600">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mt-auto pt-3 flex items-center justify-between text-[11px] text-slate-500">
                                <span class="text-violet-700 font-medium">Lihat detail →</span>
                                <span class="hidden sm:inline">Portofolio-ready</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center text-slate-500 text-sm">
                        Belum ada project.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
