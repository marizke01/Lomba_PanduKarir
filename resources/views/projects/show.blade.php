<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <div class="space-y-1">
                <p class="text-[11px] text-slate-500 uppercase tracking-wide">Project Lab</p>
                <h2 class="font-semibold text-xl text-slate-900 leading-tight">
                    {{ $project['title'] ?? 'Detail Project' }}
                </h2>
                <div class="flex flex-wrap items-center gap-2 text-[11px] text-slate-500">
                    <span class="px-2 py-0.5 rounded-full bg-slate-100 border border-slate-200">
                        {{ $project['category'] ?? 'Umum' }}
                    </span>
                    <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">
                        {{ $project['difficulty'] ?? '—' }}
                    </span>
                    @if(!empty($project['estimated_duration']))
                        <span class="px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100">
                            ⏱ {{ $project['estimated_duration'] }}
                        </span>
                    @endif
                </div>
            </div>

            <a href="{{ route('projectlab.index') }}"
               class="inline-flex items-center gap-2 text-[12px] px-3 py-2 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50">
                ← Kembali
            </a>
        </div>
    </x-slot>

    @php
        $thumb = $project['thumbnail'] ?? '';
        $fallback = $project['fallback_thumbnail'] ?? 'https://placehold.co/1600x900?text=Project+Lab';
    @endphp

    <div class="min-h-screen bg-slate-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-6 sm:py-8 space-y-5">

            {{-- THUMBNAIL (simple hero) --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="relative aspect-[16/6] bg-slate-100">
                    <img
                        src="{{ $thumb ?: $fallback }}"
                        onerror="this.onerror=null;this.src='{{ $fallback }}';"
                        alt="Thumbnail {{ $project['title'] ?? 'Project' }}"
                        class="w-full h-full object-cover"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/35 via-transparent to-transparent"></div>
                    <div class="absolute bottom-3 left-4 right-4">
                        <p class="text-[11px] text-white/80">
                            Klien: <span class="font-semibold text-white">{{ $project['company_name'] ?? '—' }}</span>
                        </p>
                        <p class="text-[12px] text-white/90 line-clamp-2">
                            {{ $project['short_description'] ?? '' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- MAIN GRID --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                {{-- LEFT: brief + checklist --}}
                <div class="lg:col-span-2 space-y-4">

                    {{-- Tujuan --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900">Tujuan project</h3>
                        <p class="text-[12px] text-slate-600 mt-2 leading-relaxed">
                            {{ $project['goal'] ?? '—' }}
                        </p>
                    </div>

                    {{-- Deliverables --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900">Yang harus kamu kerjakan</h3>
                        <p class="text-[12px] text-slate-500 mt-1">Checklist sederhana biar kamu nggak bingung.</p>

                        <ul class="mt-3 space-y-2 text-[12px] text-slate-700">
                            @forelse(($project['deliverables'] ?? []) as $d)
                                <li class="flex gap-2">
                                    <span class="mt-0.5">✅</span>
                                    <span>{{ $d }}</span>
                                </li>
                            @empty
                                <li class="text-slate-500">Belum ada deliverables.</li>
                            @endforelse
                        </ul>
                    </div>

                    {{-- Requirements --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900">Skill yang dibutuhkan</h3>

                        <ul class="mt-3 space-y-2 text-[12px] text-slate-700">
                            @forelse(($project['requirements'] ?? []) as $r)
                                <li class="flex gap-2">
                                    <span class="mt-0.5">•</span>
                                    <span>{{ $r }}</span>
                                </li>
                            @empty
                                <li class="text-slate-500">Belum ada requirements.</li>
                            @endforelse
                        </ul>

                        @if(!empty($project['skills_tags']) && is_array($project['skills_tags']))
                            <div class="mt-4 flex flex-wrap gap-1.5">
                                @foreach($project['skills_tags'] as $tag)
                                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-slate-50 border border-slate-200 text-slate-600">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>

                {{-- RIGHT: submit (sticky) --}}
                <div class="lg:sticky lg:top-6 self-start">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900">Submit hasil</h3>
                        <p class="text-[12px] text-slate-500 mt-1">
                            Tempel link hasil project + catatan singkat.
                        </p>

                        @if ($errors->any())
                            <div class="mt-3 text-[11px] text-red-600">
                                @foreach ($errors->all() as $error)
                                    <p>• {{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST"
                              action="{{ route('projectlab.submit', $project['slug']) }}"
                              class="mt-4 space-y-3">
                            @csrf

                            <div>
                                <label class="block text-[11px] text-slate-600 mb-1">Link hasil</label>
                                <input
                                    type="url"
                                    name="submission_url"
                                    value="{{ old('submission_url', $assignment->submission_url ?? '') }}"
                                    placeholder="GitHub / Figma / Canva / Demo link"
                                    class="w-full text-[12px] border border-slate-200 rounded-xl px-3 py-2
                                           focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400"
                                />
                            </div>

                            <div>
                                <label class="block text-[11px] text-slate-600 mb-1">Catatan (opsional)</label>
                                <textarea
                                    name="notes"
                                    rows="4"
                                    class="w-full text-[12px] border border-slate-200 rounded-xl px-3 py-2
                                           focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400"
                                    placeholder="Apa yang kamu buat? Kendala? Yang kamu pelajari?">{{ old('notes', $assignment->notes ?? '') }}</textarea>
                            </div>

                            <button
                                class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl
                                       bg-emerald-600 text-white text-[12px] font-semibold hover:bg-emerald-700">
                                Kirim
                            </button>

                            <p class="text-[11px] text-slate-500 text-center">
                                Saran: tambahkan screenshot di repo biar terlihat rapi.
                            </p>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
