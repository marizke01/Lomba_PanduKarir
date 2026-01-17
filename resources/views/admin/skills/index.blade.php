<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Kelola Skill</h2>
    </x-slot>

    <div class="p-6">

        @if (session('success'))
            <div class="mb-3 text-green-600 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.skills.create') }}"
           class="px-4 py-2 bg-indigo-600 text-white rounded">
            + Tambah Skill
        </a>

        <table class="mt-4 w-full border">
            <tr class="bg-gray-100">
                <th class="p-2">Judul</th>
                <th>Kategori</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>

            @foreach ($skills as $skill)
                <tr class="border-t">
                    <td class="p-2">{{ $skill->title }}</td>
                    <td>{{ $skill->category }}</td>
                    <td>{{ $skill->level }}</td>
                    <td class="flex gap-2 p-2">

                        <a href="{{ route('admin.skills.edit', $skill) }}"
                           class="text-blue-600">
                            Edit
                        </a>

                        <form action="{{ route('admin.skills.destroy', $skill) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin mau hapus skill ini? Semua progress user akan ikut terhapus!')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-600">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
