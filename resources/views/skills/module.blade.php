<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <p class="text-[11px] text-slate-500 uppercase tracking-wide">
                Modul {{ $moduleIndex + 1 }} dari {{ $totalModules }} · {{ $course['title'] }}
            </p>
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ $module['title'] ?? 'Modul' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                {{-- KONTEN MODUL (VIDEO / TEKS) --}}
                <div class="lg:col-span-2 space-y-4">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900 mb-3">
                            Materi modul
                        </h3>

                        {{-- Contoh embed YouTube kalau type video --}}
                        @if (($module['type'] ?? null) === 'video' && !empty($module['youtube_id'] ?? null))
                        <div class="aspect-video w-full rounded-2xl overflow-hidden bg-black mb-3">
                            <iframe
                                class="w-full h-full"
                                src="https://www.youtube.com/embed/{{ $module['youtube_id'] }}"
                                title="YouTube video"
                                frameborder="0"
                                allowfullscreen
                            ></iframe>
                        </div>
                    @endif


                        {{-- POINTS / YANG DIPELAJARI --}}
                        @if (!empty($module['points']) && is_array($module['points']))
                            <div class="mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                                <p class="text-xs font-semibold text-slate-900 mb-2">Yang akan kamu pelajari</p>
                                <ul class="list-disc list-inside space-y-1 text-[12px] text-slate-600">
                                    @foreach ($module['points'] as $p)
                                        <li>{{ $p }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- TUGAS MODUL --}}
                        @if (!empty($module['task']))
                            <div class="mt-3 rounded-2xl border border-emerald-100 bg-emerald-50 p-4">
                                <div class="flex items-start gap-2">
                                    <div class="mt-0.5">📝</div>
                                    <div class="w-full">
                                        <p class="text-xs font-semibold text-emerald-900">Tugas praktik modul ini</p>
                                        <p class="text-[12px] text-emerald-800 mt-1 leading-relaxed">
                                            {{ $module['task'] }}
                                        </p>
                                        <p class="text-[11px] text-emerald-700/80 mt-2">
                                            Setelah selesai, kumpulkan hasilnya di panel kanan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                {{-- TUGAS PRAKTIK + STATUS --}}
                <div class="space-y-4">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-900 mb-2">
                            Kumpulkan hasil tugas
                        </h3>
                        <p class="text-[11px] text-slate-500 mb-2">
                            Isi link/file/gambar/catatan sebagai bukti kamu sudah mengerjakan tugas.
                        </p>


                        {{-- Info ringkas kalau sudah pernah submit apa pun --}}
                        @if (!empty($progress) && ($progress->submission_url || $progress->submission_file_path || $progress->submission_image_path || $progress->notes))
                            <div class="mb-3 rounded-xl bg-emerald-50 border border-emerald-100 px-3 py-2 text-[11px] text-emerald-700 space-y-1">
                                <p class="font-semibold">
                                    Kamu sudah pernah mengumpulkan tugas untuk modul ini.
                                </p>

                                @if ($progress->submission_url)
                                    <p>
                                        🔗 Link tugas:
                                        <a href="{{ $progress->submission_url }}" target="_blank" class="text-violet-700 underline">
                                            {{ $progress->submission_url }}
                                        </a>
                                    </p>
                                @endif

                                @if ($progress->submission_file_path)
                                    <p>
                                        📎 File dokumen:
                                        <a href="{{ asset('storage/'.$progress->submission_file_path) }}" target="_blank" class="text-violet-700 underline">
                                            Download file
                                        </a>
                                    </p>
                                @endif

                                @if ($progress->submission_image_path)
                                    <p>🖼️ Gambar tugas:</p>
                                    <img
                                        src="{{ asset('storage/'.$progress->submission_image_path) }}"
                                        alt="Gambar tugas"
                                        class="mt-1 rounded-lg border border-slate-200 max-h-48"
                                    >
                                @endif

                                @if ($progress->notes)
                                    <p>
                                        📝 Catatanmu: {{ $progress->notes }}
                                    </p>
                                @endif

                                <p class="text-[10px] text-emerald-600/80">
                                    Kamu boleh kirim ulang / update tugas ini. Kiriman baru akan menggantikan yang lama.
                                </p>
                            </div>
                        @endif


                        @if ($errors->any())
                            <div class="mb-2 text-[11px] text-red-600">
                                @foreach ($errors->all() as $error)
                                    <p>• {{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="flex items-center justify-between mb-2">
                            <a href="{{ route('skills.show', $course['slug']) }}" class="text-[11px] text-slate-500 hover:text-violet-700">
                                ← Kembali ke daftar modul
                            </a>

                            @if ($moduleIndex > 0)
                                <a href="{{ route('skills.module', [$course['slug'], $moduleIndex - 1]) }}" class="text-[11px] text-slate-500 hover:text-violet-700">
                                    Modul sebelumnya
                                </a>
                            @endif
                        </div>


                        <form
                            method="POST"
                            action="{{ route('skills.module.complete', [$course['slug'], $moduleIndex]) }}"
                            enctype="multipart/form-data"
                            class="space-y-2"
                        >
                            @csrf

                            <div>
                                <label class="block text-[11px] text-slate-600 mb-1">
                                    Link tugas (GitHub, Figma, Canva, dll)
                                </label>
                                <input
                                    type="url"
                                    name="submission_url"
                                    value="{{ old('submission_url', optional($progress)->submission_url) }}"
                                    class="w-full text-xs border border-slate-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-1 focus:ring-violet-500 focus:border-violet-500"
                                    placeholder="https://github.com/username/project-umkm"
                                >
                            </div>

                            <div>
                                <label class="block text-[11px] text-slate-600 mb-1">
                                    Upload dokumen (PDF, DOC, dll)
                                </label>
                                <input
                                    type="file"
                                    name="submission_file"
                                    class="w-full text-xs border border-slate-200 rounded-xl px-3 py-1.5 bg-white"
                                >
                                <p class="text-[10px] text-slate-400 mt-1">
                                    Jika kamu tidak memilih file baru, file yang lama akan tetap dipakai.
                                </p>
                            </div>

                            <div>
                                <label class="block text-[11px] text-slate-600 mb-1">
                                    Upload gambar (screenshot hasil kerja)
                                </label>
                                <input
                                    type="file"
                                    name="submission_image"
                                    accept="image/*"
                                    class="w-full text-xs border border-slate-200 rounded-xl px-3 py-1.5 bg-white"
                                >
                            </div>

                            <div>
                                <label class="block text-[11px] text-slate-600 mb-1">
                                    Catatan (opsional)
                                </label>
                                <textarea
                                    name="notes"
                                    rows="3"
                                    class="w-full text-xs border border-slate-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-1 focus:ring-violet-500 focus:border-violet-500"
                                    placeholder="Tulis hal yang kamu pelajari / kendala yang kamu temui">{{ old('notes', optional($progress)->notes) }}</textarea>
                            </div>

                            <button
                                class="mt-1 inline-flex items-center justify-center w-full px-4 py-2 rounded-xl bg-emerald-600 text-white text-xs font-medium hover:bg-emerald-700">
                                Kumpulkan tugas praktik & lanjut modul berikutnya
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
