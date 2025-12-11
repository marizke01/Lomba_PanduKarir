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
                <span class="px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-700">
                    Level: {{ $course['level'] }}
                </span>
                <span class="px-2 py-0.5 rounded-full bg-slate-100">
                    {{ $course['duration'] }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- KIRI: VIDEO + DESKRIPSI --}}
                <div class="lg:col-span-2 space-y-4">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                        <div class="aspect-video bg-black">
                            <iframe
                                class="w-full h-full"
                                src="{{ $course['intro_video_url'] }}"
                                title="Video pelatihan {{ $course['title'] }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen
                            ></iframe>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-slate-900 mb-1">
                                Intro Pelatihan
                            </h3>
                            <p class="text-xs text-slate-600">
                                Tonton video ini sebagai pengantar sebelum masuk ke modul-modul berikutnya.
                                Di versi lengkap aplikasi, setiap modul akan punya videonya sendiri dan progress belajarmu akan disimpan.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
                        <h3 class="text-sm font-semibold text-slate-900 mb-2">
                            Tentang pelatihan ini
                        </h3>
                        <p class="text-xs text-slate-600">
                            {{ $course['short_description'] }}
                        </p>
                        <p class="text-xs text-slate-500 mt-2">
                            Di MVP ini, pelatihan masih berupa video statis. Nanti bisa dikembangkan jadi sistem modul dengan progress tracking,
                            kuis, dan tugas kecil di tiap modul.
                        </p>
                    </div>
                </div>

                {{-- KANAN: LIST MODUL --}}
                <div class="space-y-4">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
                        <h3 class="text-sm font-semibold text-slate-900 mb-2">
                            Daftar modul
                        </h3>
                        <p class="text-xs text-slate-500 mb-3">
                            Modul-modul yang akan kamu pelajari dalam pelatihan ini.
                        </p>

                        <div class="space-y-2">
                            @foreach ($course['modules'] as $index => $module)
                                <div class="flex items-center gap-3 px-3 py-2 rounded-xl border border-slate-100 bg-slate-50/60">
                                    <div class="h-7 w-7 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-[11px] font-semibold">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-medium text-slate-900">
                                            {{ $module['title'] }}
                                        </p>
                                        <p class="text-[11px] text-slate-500">
                                            {{ $module['duration'] }}
                                        </p>
                                    </div>
                                    @if ($index === 0)
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700">
                                            Intro
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
                        <h3 class="text-sm font-semibold text-slate-900 mb-2">
                            Langkah berikutnya
                        </h3>
                        <p class="text-xs text-slate-600 mb-3">
                            Setelah menyelesaikan semua modul, kamu bisa:
                        </p>
                        <ul class="list-disc list-inside text-xs text-slate-600 space-y-1">
                            <li>Ambil Project Lab yang sesuai dengan pelatihan ini.</li>
                            <li>Menambahkan hasil project ke portofolio.</li>
                            <li>Mengaktifkan sertifikat penyelesaian pelatihan + project.</li>
                        </ul>
                        <button
                            class="mt-3 inline-flex items-center px-4 py-2 rounded-xl bg-indigo-600 text-white text-xs font-medium hover:bg-indigo-700 w-full justify-center">
                            (Demo) Tandai pelatihan ini sebagai selesai
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
