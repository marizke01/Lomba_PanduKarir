@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow rounded-2xl p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Course</h1>

    <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Course Name</label>
            <input type="text" name="name" value="{{ old('name', $course->name) }}" required
                class="mt-2 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-sky-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="desc" required
                class="mt-2 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-sky-500">{{ old('desc', $course->desc) }}</textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                class="bg-sky-600 text-white px-5 py-2 rounded-lg hover:bg-sky-700 transition">Update</button>
            <a href="{{ route('courses.index') }}"
                class="bg-gray-200 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-300 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
