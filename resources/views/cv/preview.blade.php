@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6 bg-white shadow rounded-xl">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Preview CV</h1>

        <div class="space-x-2">
            <a href="{{ route('cv.index') }}"
               class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">
                Kembali
            </a>

            <a href="{{ route('cv.download') }}"
               class="px-4 py-2 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Download PDF
            </a>
        </div>
    </div>

    <hr class="mb-6">

    {{-- DATA CV --}}
    <div class="space-y-4">
        <div>
            <h2 class="text-xl font-semibold">
                {{ $cv->full_name ?? 'Nama Lengkap' }}
            </h2>
            <p class="text-gray-600">
                {{ $cv->email ?? 'email@email.com' }} |
                {{ $cv->phone ?? '08xxxxxxxx' }}
            </p>
        </div>

        <div>
            <h3 class="font-semibold">Ringkasan</h3>
            <p class="text-gray-700">
                {{ $cv->summary ?? 'Ringkasan CV belum diisi.' }}
            </p>
        </div>

        <div>
            <h3 class="font-semibold">Pendidikan</h3>
            <p class="text-gray-700">
                {{ $cv->education ?? 'Data pendidikan belum diisi.' }}
            </p>
        </div>

        <div>
            <h3 class="font-semibold">Pengalaman Kerja</h3>
            <p class="text-gray-700">
                {{ $cv->experience ?? 'Pengalaman kerja belum diisi.' }}
            </p>
        </div>

        <div>
            <h3 class="font-semibold">Skill</h3>
            <p class="text-gray-700">
                {{ $cv->skills ?? 'Skill belum diisi.' }}
            </p>
        </div>
    </div>

</div>
@endsection
