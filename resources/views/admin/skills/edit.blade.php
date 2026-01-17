<x-app-layout>
    <h1 class="text-lg font-semibold mb-4">Edit Skill</h1>

    <form method="POST" action="{{ route('admin.skills.update', $skill) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <input name="title" value="{{ $skill->title }}" class="input">
        <textarea name="description" class="input">{{ $skill->description }}</textarea>

        <input name="category" value="{{ $skill->category }}" class="input">
        <input name="level" value="{{ $skill->level }}" class="input">
        <input name="thumbnail" value="{{ $skill->thumbnail }}" class="input">
        <input name="intro_youtube_id" value="{{ $skill->intro_youtube_id }}" class="input">
        <input name="duration" value="{{ $skill->duration }}" class="input">

        <label class="flex gap-2 items-center">
            <input type="checkbox" name="is_active" {{ $skill->is_active ? 'checked' : '' }}>
            Aktif
        </label>

        <hr>

        <h2 class="font-semibold">Modul Pelatihan</h2>

        <div id="modules-wrapper" class="space-y-3"></div>

        <button type="button"
                onclick="addModule()"
                class="px-3 py-1 bg-slate-200 rounded text-sm">
            + Tambah Modul
        </button>

        <button class="px-4 py-2 bg-indigo-600 text-white rounded">
            Update Skill
        </button>
    </form>

    <script>
        let moduleIndex = 0;
        const existingModules = @json($skill->modules ?? []);

        function addModule(data = {}) {
            const wrapper = document.getElementById('modules-wrapper');

            wrapper.insertAdjacentHTML('beforeend', `
                <div class="border p-3 rounded space-y-2">
                    <div class="flex justify-between">
                        <strong>Modul ${moduleIndex + 1}</strong>
                        <button type="button" onclick="this.closest('div.border').remove()"
                                class="text-red-500 text-xs">
                            Hapus
                        </button>
                    </div>

                    <input name="modules[${moduleIndex}][title]"
                           value="${data.title ?? ''}"
                           class="input" required>

                    <input name="modules[${moduleIndex}][youtube_id]"
                           value="${data.youtube_id ?? ''}"
                           class="input">

                    <input name="modules[${moduleIndex}][duration]"
                           value="${data.duration ?? ''}"
                           class="input">

                    <textarea name="modules[${moduleIndex}][task]"
                              class="input">${data.task ?? ''}</textarea>

                    <textarea name="modules[${moduleIndex}][points]"
                              class="input">${(data.points ?? []).join('\n')}</textarea>
                </div>
            `);

            moduleIndex++;
        }

        existingModules.forEach(m => addModule(m));
    </script>
</x-app-layout>
