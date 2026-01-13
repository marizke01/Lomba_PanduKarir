<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="text-3xl font-bold">
                Portofolio
            </h2>
            <p class="text-sm text-gray-500">
                Kumpulan project nyata yang sudah kamu kerjakan dari Project Lab.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-slate-50 to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
@php
    $techImages = [
        'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80',
        'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&w=800&q=80',
        'https://images.unsplash.com/photo-1526378722484-bd91ca387e72?auto=format&fit=crop&w=800&q=80',
        'https://images.unsplash.com/photo-1504639725590-34d0984388bd?auto=format&fit=crop&w=800&q=80',
        'https://images.unsplash.com/photo-1537432376769-00f5c2f4c8d2?auto=format&fit=crop&w=800&q=80',
    ];
@endphp

            @if ($portfolios->isEmpty())
                <div class="bg-white border border-dashed border-slate-300 rounded-3xl p-12 text-center">
                    <h3 class="text-lg font-semibold text-slate-800 mb-2">
                        Portofoliomu masih kosong
                    </h3>
                    <p class="text-sm text-slate-500 mb-4">
                        Selesaikan Project Lab untuk mulai membangun portofolio profesional.
                    </p>
                    <a href="{{ route('projectlab.index') }}"
                       class="inline-flex items-center px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                        Mulai Project Lab
                    </a>
                </div>

    
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-7">

                    @foreach ($portfolios as $portfolio)
                        <div class="group bg-white border rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">

                            {{-- Thumbnail --}}
                            <div class="relative">
                           <img
                                loading="lazy"
                                src="{{ $portfolio->thumbnail
                                    ? asset('storage/' . $portfolio->thumbnail)
                                    : ($techImages[$loop->index % count($techImages)] ?? $techImages[0]) }}"
                                alt="{{ $portfolio->title }}"
                                class="w-full h-44 object-cover">


                                {{-- Status --}}
                                <span class="absolute top-3 right-3 text-[11px] px-3 py-1 rounded-full shadow
                                    {{ $portfolio->result_url ? 'bg-emerald-500 text-white' : 'bg-amber-500 text-white' }}">
                                    {{ $portfolio->result_url ? 'Completed' : 'In Progress' }}
                                </span>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 flex flex-col flex-1">

                                <h3 class="text-lg font-semibold text-slate-900 group-hover:text-indigo-600 transition">
                                    {{ $portfolio->title }}
                                </h3>

                                <p class="text-sm text-slate-600 mt-2 mb-4 line-clamp-3 leading-relaxed">
                                    {{ $portfolio->description }}
                                </p>

                                {{-- Tech Stack --}}
                                <div class="flex flex-wrap gap-2 mb-5">
                                    <span class="text-[11px] px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 font-medium">
                                        Laravel
                                    </span>
                                    <span class="text-[11px] px-3 py-1 rounded-full bg-sky-50 text-sky-700 font-medium">
                                        Tailwind
                                    </span>
                                    <span class="text-[11px] px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-medium">
                                        HTML
                                    </span>
                                </div>

                                {{-- Actions --}}
                                <div class="mt-auto flex gap-3">
                                    <a href="{{ route('portfolio.show', $portfolio->id) }}"
                                       class="flex-1 text-center px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 text-slate-700 hover:bg-slate-50 transition">
                                        Detail
                                    </a>

                                    @if ($portfolio->result_url)
                                        <a href="{{ $portfolio->result_url }}"
                                           target="_blank"
                                           class="flex-1 text-center px-4 py-2 rounded-xl text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700 transition">
                                            Live Demo
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </div>
</x-app-layout>
