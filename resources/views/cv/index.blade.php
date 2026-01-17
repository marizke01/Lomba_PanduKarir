<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-1">
                <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                    CV Builder — Step by Step
                </h2>
                <p class="text-xs text-gray-500">
                    Ikuti langkah-langkahnya untuk membuat CV profesional.
                </p>
            </div>

            @if($cv)
                <a href="{{ route('cv.view') }}"
                   class="inline-flex items-center px-4 py-2 text-xs font-medium bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700">
                    Lihat CV Saya
                    <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-width="2" d="M5 12h14m-7-6 6 6-6 6"/>
                    </svg>
                </a>
            @endif
        </div>
    </x-slot>


    {{-- MAIN --}}
    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="mb-4 text-sm text-emerald-700 bg-emerald-50 border border-emerald-200 px-4 py-2 rounded-xl shadow">
                    {{ session('success') }}
                </div>
            @endif


            <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- ========== STEP 1: INFORMASI PRIBADI ========== --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <div class="flex items-start gap-4">
                        <div class="h-8 w-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-bold">
                            1
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Informasi Pribadi</h3>
                            <p class="text-xs text-slate-500">
                                Lengkapi data dasar sebagai identitas dalam CV.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-medium text-slate-600">Nama</label>
                            <input type="text"
                                   class="w-full mt-1 border border-slate-300 rounded-xl text-sm px-3 py-2 bg-slate-100"
                                   value="{{ Auth::user()->name }}" disabled>
                        </div>

                        <div>
                            <label class="text-xs font-medium text-slate-600">Email</label>
                            <input type="text"
                                   class="w-full mt-1 border border-slate-300 rounded-xl text-sm px-3 py-2 bg-slate-100"
                                   value="{{ Auth::user()->email }}" disabled>
                        </div>

                        <div>
                            <label class="text-xs font-medium text-slate-600">No HP</label>
                            <input type="text" name="phone"
                                   class="w-full mt-1 border border-slate-300 rounded-xl text-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                                   value="{{ $cv->phone ?? '' }}">
                        </div>

                        <div>
                            <label class="text-xs font-medium text-slate-600">Lokasi</label>
                            <input type="text" name="location"
                                   class="w-full mt-1 border border-slate-300 rounded-xl text-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                                   value="{{ $cv->location ?? '' }}">
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-medium text-slate-600">Profesi / Role</label>
                        <input type="text" name="position"
                            class="w-full mt-1 border border-slate-300 rounded-xl text-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Contoh: Web Developer, Graphic Designer"
                            value="{{ $cv->position ?? '' }}">
                    </div>


                    <div class="mt-4">
                        <label class="text-xs font-medium text-slate-600">Foto Profil</label>
                        <input type="file" name="photo"
                            class="w-full mt-1 border border-slate-300 rounded-xl text-sm px-3 py-2 bg-white">
                    </div>


                    <div class="mt-4">
                        <label class="text-xs font-medium text-slate-600">Tentang Saya</label>
                        <textarea name="about" rows="4"
                                  class="w-full mt-1 border border-slate-300 rounded-xl text-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">{{ $cv->about ?? '' }}</textarea>
                    </div>
                </div>



                {{-- ========== STEP 2: PENDIDIKAN ========== --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <div class="flex items-start gap-4">
                        <div class="h-8 w-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-bold">
                            2
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Riwayat Pendidikan</h3>
                            <p class="text-xs text-slate-500">
                                Tambahkan pendidikan formal terakhir hingga terbaru.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 space-y-4" id="education-wrapper">
                        @php
                            $education = $cv->education ?? [['school'=>'','major'=>'','year'=>'']];
                        @endphp

                        @foreach($education as $i => $edu)
                            <div class="p-4 border border-slate-200 rounded-xl bg-slate-50 shadow-sm grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <input type="text" name="education[{{ $i }}][school]"
                                       class="border border-slate-300 rounded-xl text-sm px-3 py-2"
                                       placeholder="Nama Sekolah / Kampus"
                                       value="{{ $edu['school'] ?? '' }}">

                                <input type="text" name="education[{{ $i }}][major]"
                                       class="border border-slate-300 rounded-xl text-sm px-3 py-2"
                                       placeholder="Jurusan"
                                       value="{{ $edu['major'] ?? '' }}">

                                <input type="text" name="education[{{ $i }}][year]"
                                       class="border border-slate-300 rounded-xl text-sm px-3 py-2"
                                       placeholder="Tahun (contoh: 2020–2024)"
                                       value="{{ $edu['year'] ?? '' }}">
                            </div>
                        @endforeach
                    </div>

                    <button type="button"
                            onclick="addEducation()"
                            class="mt-3 px-3 py-1.5 text-xs bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 shadow-sm">
                        + Tambah Pendidikan
                    </button>
                </div>



                {{-- ========== STEP 3: PENGALAMAN ========== --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <div class="flex items-start gap-4">
                        <div class="h-8 w-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-bold">
                            3
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Pengalaman</h3>
                            <p class="text-xs text-slate-500">
                                Tambahkan pengalaman kerja, magang, atau project.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 space-y-4" id="experience-wrapper">
                        @php
                            $experience = $cv->experience ?? [['title'=>'','desc'=>'','year'=>'']];
                        @endphp

                        @foreach($experience as $i => $exp)
                            <div class="p-4 border border-slate-200 rounded-xl bg-slate-50 shadow-sm space-y-3">
                                <input type="text" name="experience[{{ $i }}][title]"
                                       class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2"
                                       placeholder="Nama Pekerjaan / Project"
                                       value="{{ $exp['title'] ?? '' }}">

                                <textarea name="experience[{{ $i }}][desc]"
                                          class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2"
                                          placeholder="Deskripsi">{{ $exp['desc'] ?? '' }}</textarea>

                                <input type="text" name="experience[{{ $i }}][year]"
                                       class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2"
                                       placeholder="Tahun"
                                       value="{{ $exp['year'] ?? '' }}">
                            </div>
                        @endforeach
                    </div>

                    <button type="button"
                            onclick="addExperience()"
                            class="mt-3 px-3 py-1.5 text-xs bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 shadow-sm">
                        + Tambah Pengalaman
                    </button>
                </div>



                {{-- ========== STEP 4: SKILL ========== --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <div class="flex items-start gap-4">
                        <div class="h-8 w-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-bold">
                            4
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Keahlian (Skills)</h3>
                            <p class="text-xs text-slate-500">Masukkan skill teknis maupun non-teknis.</p>
                        </div>
                    </div>

                    <div class="mt-5 space-y-2" id="skills-wrapper">
                        @php $skills = $cv->skills ?? ['']; @endphp

                        @foreach($skills as $i => $skill)
                            <input type="text" name="skills[{{ $i }}]"
                                   class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2"
                                   placeholder="Contoh: UI/UX Design, Laravel, Figma"
                                   value="{{ $skill }}">
                        @endforeach
                    </div>

                    <button type="button"
                            onclick="addSkill()"
                            class="mt-3 px-3 py-1.5 text-xs bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 shadow-sm">
                        + Tambah Skill
                    </button>
                </div>



                {{-- ========== STEP 5: LINKS ========== --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <div class="flex items-start gap-4">
                        <div class="h-8 w-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-bold">
                            5
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Link Portofolio</h3>
                            <p class="text-xs text-slate-500">
                                Masukkan link LinkedIn, GitHub, portofolio, atau platform lain.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 space-y-2" id="links-wrapper">
                        @php $links = $cv->links ?? ['']; @endphp

                        @foreach($links as $i => $ln)
                            <input type="text" name="links[{{ $i }}]"
                                   class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2"
                                   placeholder="https://linkedin.com/in/username"
                                   value="{{ $ln }}">
                        @endforeach
                    </div>

                    <button type="button"
                            onclick="addLink()"
                            class="mt-3 px-3 py-1.5 text-xs bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 shadow-sm">
                        + Tambah Link
                    </button>
                </div>

                {{-- ========== STEP 6: HOBBIES ========== --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <div class="flex items-start gap-4">
                        <div class="h-8 w-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-bold">
                            6
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Hobi</h3>
                            <p class="text-xs text-slate-500">
                                Masukkan hobi, minat, atau aktivitas favorit.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <textarea name="hobbies"
                                class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2"
                                rows="3"
                                placeholder="Contoh: Menulis, Desain, Hiking, Memasak"
                        >{{ $cv->hobbies ?? '' }}</textarea>
                    </div>
                </div>




                {{-- SAVE BUTTON --}}
                <div class="flex justify-end pt-4">
                    <button type="submit"
                            class="px-6 py-2.5 text-sm bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 shadow">
                        Simpan CV
                    </button>
                </div>

            </form>

        </div>
    </div>



    {{-- JS: Dynamic Fields --}}
    <script>
        function addEducation() {
            const wrapper = document.getElementById('education-wrapper');
            const index = wrapper.children.length;

            wrapper.innerHTML += `
                <div class="p-4 border border-slate-200 rounded-xl bg-slate-50 shadow-sm grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <input type="text" name="education[${index}][school]" class="border border-slate-300 rounded-xl text-sm px-3 py-2" placeholder="Nama Sekolah / Kampus">
                    <input type="text" name="education[${index}][major]" class="border border-slate-300 rounded-xl text-sm px-3 py-2" placeholder="Jurusan">
                    <input type="text" name="education[${index}][year]" class="border border-slate-300 rounded-xl text-sm px-3 py-2" placeholder="Tahun (contoh: 2020–2024)">
                </div>`;
        }

        function addExperience() {
            const wrapper = document.getElementById('experience-wrapper');
            const index = wrapper.children.length;

            wrapper.innerHTML += `
                <div class="p-4 border border-slate-200 rounded-xl bg-slate-50 shadow-sm space-y-3">
                    <input type="text" name="experience[${index}][title]" class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2" placeholder="Nama Pekerjaan / Project">
                    <textarea name="experience[${index}][desc]" class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2" placeholder="Deskripsi"></textarea>
                    <input type="text" name="experience[${index}][year]" class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2" placeholder="Tahun">
                </div>`;
        }

        function addSkill() {
            const wrapper = document.getElementById('skills-wrapper');
            const index = wrapper.children.length;

            wrapper.innerHTML += `<input type="text" name="skills[${index}]" class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2" placeholder="Contoh: UI/UX Design, Laravel, Figma">`;
        }

        function addLink() {
            const wrapper = document.getElementById('links-wrapper');
            const index = wrapper.children.length;

            wrapper.innerHTML += `<input type="text" name="links[${index}]" class="w-full border border-slate-300 rounded-xl text-sm px-3 py-2" placeholder="https://linkedin.com/in/username">`;
        }
    </script>

</x-app-layout>
