<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="font-semibold text-2xl text-gray-900">
                Portofolio
            </h2>
            <p class="text-sm text-gray-500">
                Kumpulan project nyata yang sudah kamu kerjakan dari Project Lab.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-slate-50 to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            @if ($portfolios->isEmpty())
                <div class="bg-white border border-dashed border-slate-300 rounded-3xl p-12 text-center">
                    <h3 class="text-lg font-semibold text-slate-800 mb-2">
                        Portofoliomu masih kosong
                    </h3>
                    <p class="text-sm text-slate-500 mb-4">
                        Selesaikan Project Lab untuk mulai membangun portofolio profesional.
                    </p>
                    <a href="{{ route('projectlab.index') }}"
                       class="inline-flex items-center px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700">
                        Mulai Project Lab
                    </a>
                </div>
            @else
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach ($portfolios as $item)
                        <div
                            class="group bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">

                            {{-- HERO / PREVIEW --}}
                            <div
                                class="relative h-44 bg-gradient-to-br from-indigo-500 via-indigo-500 to-sky-500 flex items-center justify-center">

                                <span class="text-white text-sm font-medium opacity-80">
                                    Preview Project
                                </span>

                                <span
                                    class="absolute top-4 left-4 text-[11px] px-3 py-1 rounded-full bg-white/90 text-indigo-600 font-medium">
                                    Project Lab
                                </span>
                            </div>

                            {{-- CONTENT --}}
                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="text-base font-semibold text-slate-900 mb-1">
                                    {{ $item->title }}
                                </h3>

                                <p class="text-sm text-slate-600 mb-4 line-clamp-3">
                                    {{ $item->description }}
                                </p>

                                {{-- TECH STACK --}}
                                <div class="flex flex-wrap gap-2 mb-5">
                                    <span
                                        class="text-[11px] px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 font-medium">
                                        Laravel
                                    </span>
                                    <span
                                        class="text-[11px] px-3 py-1 rounded-full bg-sky-50 text-sky-700 font-medium">
                                        Tailwind
                                    </span>
                                    <span
                                        class="text-[11px] px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-medium">
                                        HTML
                                    </span>
                                </div>

                                {{-- ACTION --}}
                                <div class="mt-auto flex gap-3">
                                    <a href="{{ route('portfolio.show', $item->id) }}"
                                       class="flex-1 text-center px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 text-slate-700 hover:bg-slate-50">
                                        Detail
                                    </a>

                                    <a href="{{ $item->result_url }}"
                                       target="_blank"
                                       class="flex-1 text-center px-4 py-2 rounded-xl text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700">
                                        Live Demo
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </div>
</x-app-layout>
