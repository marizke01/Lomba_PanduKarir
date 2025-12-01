@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white rounded-2xl shadow p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Create New Course</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" required
                class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-700 focus:outline-none">
        </div>

        <div>
            <label for="desc" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="desc" id="desc" rows="4" required
                class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-700 focus:outline-none"></textarea>
        </div>

        <button type="submit"
            class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-sky-700 transition">Create</button>

        <a href="{{ route('courses.index') }}"
            class="ml-3 text-gray-600 hover:text-gray-900">Back</a>
    </form>
</div>
@endsection
