<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900">
            Sertifikat Saya
        </h2>
        <p class="text-sm text-gray-500">
            Sertifikat yang kamu peroleh setelah menyelesaikan Project Lab.
        </p>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto px-4 space-y-4">

        @forelse ($certificates as $certificate)
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center justify-between">

                {{-- INFO --}}
                <div>
                    <p class="font-semibold text-slate-900">
                        {{ $certificate->project_title }}
                    </p>
                    <p class="text-sm text-slate-500">
                        Diterbitkan {{ $certificate->issued_at->format('d M Y') }}
                    </p>
                </div>

                {{-- ACTION --}}
                <div class="flex gap-2">
                    <a href="{{ route('certificates.show', $certificate) }}"
                       class="px-4 py-2 rounded-xl text-sm border border-slate-200 text-slate-700 hover:bg-slate-50">
                        Lihat
                    </a>

                    <a href="{{ route('certificates.download', $certificate->id) }}"
                       class="px-4 py-2 rounded-xl text-sm bg-indigo-600 text-white hover:bg-indigo-700">
                        Download PDF
                    </a>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl p-8 text-center text-slate-500 border border-dashed">
                Belum ada sertifikat yang tersedia.
            </div>
        @endforelse

    </div>
</x-app-layout>
