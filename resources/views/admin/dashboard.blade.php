<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                Admin Dashboard
            </h2>
            <p class="text-xs text-gray-500">
                Ringkasan dan pengelolaan platform SkillBridge.
            </p>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-b from-slate-50 to-slate-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- HERO CARD --}}
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-600 via-indigo-500 to-sky-500 shadow-lg">
                <div class="relative px-6 py-6 flex flex-col md:flex-row md:justify-between gap-4">
                    <div>
                        <p class="text-xs text-indigo-100 mb-1">
                            Selamat datang,
                        </p>
                        <h3 class="text-xl font-semibold text-white mb-2">
                            {{ Auth::user()->name }} (Admin)
                        </h3>
                        <p class="text-sm text-indigo-100 max-w-md">
                            Kelola data skill, project lab, dan pengguna SkillBridge dari satu tempat.
                        </p>
                    </div>
                </div>
            </div>

            {{-- STAT CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Total User --}}
                <div class="bg-white rounded-2xl shadow-sm p-4">
                    <p class="text-xs text-slate-500">Total User</p>
                    <p class="text-3xl font-semibold text-indigo-600">
                        {{ $totalUsers }}
                    </p>
                </div>

                {{-- Total Skill --}}
                <div class="bg-white rounded-2xl shadow-sm p-4">
                    <p class="text-xs text-slate-500">Total Skill</p>
                    <p class="text-3xl font-semibold text-emerald-600">
                        {{ $totalSkills }}
                    </p>
                </div>

                {{-- Project Lab --}}
                <div class="bg-white rounded-2xl shadow-sm p-4">
                    <p class="text-xs text-slate-500">Project Lab</p>
                    <p class="text-3xl font-semibold text-sky-600">
                        {{ $totalProjects }}
                    </p>
                </div>
            </div>

            {{-- QUICK ACTIONS --}}
            <div class="grid md:grid-cols-2 gap-4">
                <a href="#"
                   class="bg-white rounded-2xl shadow-sm p-5 hover:bg-slate-50">
                    <h3 class="font-semibold text-slate-800">Kelola Skill</h3>
                    <p class="text-xs text-slate-500">
                        Tambah, edit, dan atur pelatihan skill.
                    </p>
                </a>

                <a href="#"
                   class="bg-white rounded-2xl shadow-sm p-5 hover:bg-slate-50">
                    <h3 class="font-semibold text-slate-800">Kelola Project Lab</h3>
                    <p class="text-xs text-slate-500">
                        Atur project simulasi untuk user.
                    </p>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
