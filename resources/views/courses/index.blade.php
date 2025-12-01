@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">All Courses</h1>
        <a href="{{ route('courses.create') }}"
            class="bg-sky-600 text-white px-5 py-2 rounded-lg hover:bg-sky-700 transition">Add Course</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-sky-100 text-sky-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($courses->isEmpty())
        <p class="text-gray-500 text-center py-10">No courses available yet.</p>
    @else
        <div class="overflow-x-auto bg-white shadow rounded-2xl">
            <table class="min-w-full border-collapse">
                <thead class="bg-sky-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Trainer ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $course->trainer_id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $course->name }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $course->desc }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('courses.show', $course->id) }}"
                                    class="text-blue-600 hover:underline">View</a>
                                <a href="{{ route('courses.edit', $course->id) }}"
                                    class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Delete this course?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
