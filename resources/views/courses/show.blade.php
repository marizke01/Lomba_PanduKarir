@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow rounded-2xl p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Course Details</h1>

    <div class="space-y-4">
        <div>
            <p class="text-gray-500 text-sm">Course Name</p>
            <p class="text-lg font-semibold text-gray-900">{{ $course->name }}</p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Description</p>
            <p class="text-gray-800">{{ $course->desc }}</p>
        </div>

        @if($course->trainer_id)
        <div>
            <p class="text-gray-500 text-sm">Trainer ID</p>
            <p class="text-gray-800">{{ $course->trainer_id }}</p>
        </div>
        @endif
    </div>

    <div class="mt-8 flex gap-3">
        <a href="{{ route('courses.edit', $course->id) }}"
            class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600 transition">Edit</a>
        <a href="{{ route('courses.index') }}"
            class="bg-gray-200 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-300 transition">Back</a>
    </div>
</div>
@endsection
