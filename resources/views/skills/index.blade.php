<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <h2 class="font-semibold text-xl text-gray-900">
                Belajar Skill
            </h2>
            <p class="text-xs text-gray-500">
                Pilih pelatihan yang ingin kamu mulai. Setiap pelatihan memiliki materi yang berbeda.
            </p>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Daftar Course --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <a href="{{ route('skills.show', $course['slug']) }}"
                       class="group bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden flex flex-col">

                        {{-- Thumbnail Image --}}
                        <div class="h-40 w-full bg-cover bg-center"
                             style="background-image: url('{{ $course['thumbnail'] ?? 'https://source.unsplash.com/600x400/?education' }}')">
                        </div>

                        {{-- Content --}}
                        <div class="p-4 flex flex-col flex-1">
                            <div class="flex justify-between items-center mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-[11px] text-slate-600">
                                    {{ $course['category'] }}
                                </span>
                                <span class="px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-700 text-[11px]">
                                    {{ $course['level'] }}
                                </span>
                            </div>

                            <h3 class="text-sm font-semibold text-slate-900 group-hover:text-indigo-600">
                                {{ $course['title'] }}
                            </h3>

                            <p class="text-xs text-slate-500 mt-1 line-clamp-3">
                                {{ $course['short_description'] }}
                            </p>

                            <div class="mt-auto pt-3 flex items-center justify-between text-[11px] text-slate-500">
                                <span>{{ $course['duration'] }}</span>
                                <span class="text-indigo-600 group-hover:text-indigo-700 font-medium flex items-center gap-1">
                                    Lihat pelatihan
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" d="M5 12h14m-7-6 6 6-6 6"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
