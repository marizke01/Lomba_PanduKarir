<x-app-layout>
    <h1 class="text-lg font-semibold mb-4">Tambah Skill</h1>

    <form method="POST" action="{{ route('admin.skills.store') }}" class="space-y-4">
        @csrf

        <input name="title" placeholder="Judul skill" class="input" required>
        <textarea name="description" placeholder="Deskripsi" class="input"></textarea>

        <input name="category" placeholder="Kategori (Teknologi/Desain)" class="input">
        <input name="level" placeholder="Level (Pemula)" class="input">

        <input name="thumbnail" placeholder="Thumbnail YouTube URL" class="input">
        <input name="intro_youtube_id" placeholder="Intro YouTube ID" class="input">
        <input name="duration" placeholder="Total durasi (mis: 3 jam)" class="input">

        <hr>

        <h2 class="font-semibold">Modul Pelatihan</h2>

        <div id="modules-wrapper" class="space-y-3"></div>

        <button type="button"
                onclick="addModule()"
                class="px-3 py-1 bg-slate-200 rounded text-sm">
            + Tambah Modul
        </button>

        <button class="px-4 py-2 bg-indigo-600 text-white rounded">
            Simpan Skill
        </button>
    </form>

    <script>
        let moduleIndex = 0;

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
                           placeholder="Judul Modul" class="input" required>

                    <input name="modules[${moduleIndex}][youtube_id]"
                           value="${data.youtube_id ?? ''}"
                           placeholder="YouTube ID" class="input">

                    <input name="modules[${moduleIndex}][duration]"
                           value="${data.duration ?? ''}"
                           placeholder="Durasi (mis: 30 menit)" class="input">

                    <textarea name="modules[${moduleIndex}][task]"
                              placeholder="Tugas modul"
                              class="input">${data.task ?? ''}</textarea>

                    <textarea name="modules[${moduleIndex}][points]"
                              placeholder="Poin pembelajaran (1 baris = 1 poin)"
                              class="input">${(data.points ?? []).join('\n')}</textarea>
                </div>
            `);

            moduleIndex++;
        }

        // default 1 modul
        addModule();
    </script>
</x-app-layout>
