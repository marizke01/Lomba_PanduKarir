<x-app-layout>
    {{-- HERO --}}
    <section class="bg-gradient-to-r from-indigo-600 to-blue-500 py-20">
        <div class="max-w-6xl mx-auto px-6 text-white">
            <p class="uppercase tracking-widest text-sm opacity-80 mb-2">
                Portfolio Project
            </p>

            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                {{ $portfolio->title }}
            </h1>

            <p class="max-w-2xl text-lg opacity-90">
                {{ $portfolio->description }}
            </p>

            <div class="flex flex-wrap gap-4 mt-8">
                <a href="{{ $portfolio->result_url }}" target="_blank"
                   class="px-6 py-3 bg-white text-indigo-700 font-semibold rounded-xl shadow hover:bg-indigo-50 transition">
                    🔗 Live Project
                </a>

                <a href="{{ route('portfolio.index') }}"
                   class="px-6 py-3 border border-white/40 rounded-xl hover:bg-white/10 transition">
                    ← Back to Portfolio
                </a>
            </div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="py-16 bg-slate-50">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-10">

            {{-- MAIN --}}
            <div class="md:col-span-2 space-y-10">

                <div>
                    <h2 class="text-2xl font-semibold mb-3">
                        Project Description
                    </h2>
                    <p class="text-slate-700 leading-relaxed">
                        {{ $portfolio->description }}
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-3">
                        What I Built
                    </h2>
                    <p class="text-slate-700 leading-relaxed">
                        Project ini dikerjakan sebagai bagian dari Project Lab,
                        mencerminkan kemampuan implementasi solusi nyata berbasis studi kasus.
                    </p>
                </div>

                <div class="border-t pt-6">
                    <a href="{{ $portfolio->result_url }}" target="_blank"
                       class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:underline">
                        View Repository / Live Result →
                    </a>
                </div>
            </div>

            {{-- SIDEBAR --}}
            <aside class="bg-white rounded-2xl shadow-sm p-6 space-y-5 h-fit">

                <div>
                    <p class="text-xs text-slate-500 uppercase">Project Type</p>
                    <p class="font-semibold">Project Lab</p>
                </div>

                <div>
                    <p class="text-xs text-slate-500 uppercase">Slug</p>
                    <p class="text-sm text-slate-700">
                        {{ $portfolio->project_slug }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-slate-500 uppercase">Completed At</p>
                    <p class="text-sm text-slate-700">
                        {{ $portfolio->created_at->format('d M Y') }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-slate-500 uppercase">Status</p>
                    <span class="inline-block mt-1 px-3 py-1 text-xs rounded-full
                        {{ $portfolio->status === 'approved'
                            ? 'bg-emerald-100 text-emerald-700'
                            : 'bg-slate-100 text-slate-600' }}">
                        {{ ucfirst($portfolio->status) }}
                    </span>
                </div>

            </aside>
        </div>
    </section>
</x-app-layout>
