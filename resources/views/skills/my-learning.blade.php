<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                Pelatihan Saya
            </h2>
            <p class="text-xs text-gray-500">
                Daftar pelatihan yang sedang kamu ikuti di SkillBridge.
            </p>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if ($activeCourses->isEmpty())
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                    <h3 class="text-sm font-semibold text-slate-900 mb-2">
                        Belum ada pelatihan aktif
                    </h3>
                    <p class="text-xs text-slate-600 mb-3">
                        Yuk mulai satu pelatihan dulu. Nanti progress-mu akan muncul di halaman ini.
                    </p>
                    <a href="{{ route('skills.index') }}"
                       class="inline-flex items-center px-4 py-2 rounded-xl bg-indigo-600 text-white text-xs font-medium hover:bg-indigo-700">
                        Jelajahi pelatihan SkillBridge
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($activeCourses as $course)
                        <a href="{{ route('skills.show', $course['slug']) }}"
                           class="group bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">
                            <div class="h-32 w-full bg-cover bg-center"
                                 style="background-image: url('{{ $course['thumbnail'] ?? 'https://source.unsplash.com/600x400/?education' }}')">
                            </div>
                            <div class="p-4 flex flex-col flex-1">
                                <div class="flex justify-between items-center mb-1.5">
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
                                <p class="text-[11px] text-slate-500 mt-1">
                                    {{ $course['completedModules'] }} / {{ $course['totalModules'] }} modul selesai
                                </p>

                                {{-- progress bar --}}
                                <div class="mt-2">
                                    <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-indigo-500" style="width: {{ $course['percent'] }}%"></div>
                                    </div>
                                    <p class="text-[11px] text-slate-500 mt-1">
                                        Progress: {{ $course['percent'] }}%
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
