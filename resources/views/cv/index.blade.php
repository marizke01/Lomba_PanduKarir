<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4">

        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">
                CV Builder — Step by Step
            </h1>
            <p class="text-sm text-gray-500">
                Lengkapi data berikut untuk membangun CV profesional.
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="#" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- INFORMASI PRIBADI -->
            <section class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center gap-3 mb-5">
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-600 text-white text-sm font-semibold">
                        1
                    </span>
                    <h2 class="font-semibold text-gray-900">Informasi Pribadi</h2>
                </div>

                <div class="mb-4">
                    <label class="text-sm text-gray-600 block mb-1">Foto Profil</label>
                    <input type="file" name="photo" class="w-full text-sm">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input name="name" class="cv-input" placeholder="Nama Lengkap">
                    <input name="email" class="cv-input" placeholder="Email">
                    <input name="phone" class="cv-input" placeholder="No HP">
                    <input name="location" class="cv-input" placeholder="Lokasi">
                </div>

                <div class="mt-4">
                    <input name="role" class="cv-input" placeholder="Posisi / Role">
                </div>

                <div class="mt-4">
                    <textarea name="about" rows="3" class="cv-input" placeholder="Tentang Saya"></textarea>
                </div>
            </section>

            <!-- PENDIDIKAN -->
            <section class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center gap-3 mb-5">
                    <span class="step-circle">2</span>
                    <h2 class="font-semibold text-gray-900">Riwayat Pendidikan</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input name="education[0][school]" class="cv-input" placeholder="Sekolah / Kampus">
                    <input name="education[0][major]" class="cv-input" placeholder="Jurusan">
                    <input name="education[0][year]" class="cv-input" placeholder="Tahun">
                </div>

                <button type="button" class="btn-secondary mt-4">
                    + Tambah Pendidikan
                </button>
            </section>

            <!-- PENGALAMAN -->
            <section class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center gap-3 mb-5">
                    <span class="step-circle">3</span>
                    <h2 class="font-semibold text-gray-900">Pengalaman</h2>
                </div>

                <input name="experience[0][title]" class="cv-input mb-4" placeholder="Nama Pekerjaan / Project">
                <textarea name="experience[0][description]" rows="3" class="cv-input mb-4" placeholder="Deskripsi"></textarea>
                <input name="experience[0][year]" class="cv-input" placeholder="Tahun">

                <button type="button" class="btn-secondary mt-4">
                    + Tambah Pengalaman
                </button>
            </section>

            <!-- SKILL -->
            <section class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center gap-3 mb-5">
                    <span class="step-circle">4</span>
                    <h2 class="font-semibold text-gray-900">Keahlian</h2>
                </div>

                <input name="skills" class="cv-input" placeholder="Laravel, UI/UX, Figma">
            </section>

            <!-- LINK -->
            <section class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center gap-3 mb-5">
                    <span class="step-circle">5</span>
                    <h2 class="font-semibold text-gray-900">Link Portofolio</h2>
                </div>

                <input name="links[0]" class="cv-input mb-3" placeholder="https://linkedin.com/in/username">
                <button type="button" class="btn-secondary">
                    + Tambah Link
                </button>
            </section>

            <!-- HOBI -->
            <section class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center gap-3 mb-5">
                    <span class="step-circle">6</span>
                    <h2 class="font-semibold text-gray-900">Hobi</h2>
                </div>

                <textarea name="hobbies" rows="2" class="cv-input" placeholder="Menulis, Desain, Hiking"></textarea>
            </section>

            <!-- SUBMIT -->
            <div class="flex justify-end">
                <button type="submit" class="btn-primary">
                    Simpan CV
                </button>
            </div>
        </form>
    </div>

    <!-- STYLE (SEMENTARA DI BLADE) -->
    <style>
        .cv-input {
            width: 100%;
            border-radius: 12px;
            border: 1px solid #d1d5db;
            padding: 10px 12px;
            font-size: 14px;
        }
        .cv-input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99,102,241,.15);
        }
        .btn-primary {
            background: #6366f1;
            color: white;
            border-radius: 14px;
            padding: 10px 26px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: 0 10px 26px rgba(99,102,241,.35);
        }
        .btn-secondary {
            background: #eef2ff;
            color: #4f46e5;
            border-radius: 12px;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 500;
        }
        .step-circle {
            width: 32px;
            height: 32px;
            border-radius: 9999px;
            background: #6366f1;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 600;
        }
    </style>
</x-app-layout>
