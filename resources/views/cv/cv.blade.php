<div class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden border">
    <div class="grid grid-cols-3">

        <!-- LEFT SIDEBAR -->
        <div class="col-span-1 bg-purple-600 text-white p-6 flex flex-col items-center">

            <!-- FOTO -->
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow mb-4">
                <img src="{{ $photo ?? '/img/default-user.png' }}" class="w-full h-full object-cover">
            </div>

            <!-- NAMA -->
            <h2 class="text-2xl font-bold text-center">{{ $name ?? 'Nama Lengkap' }}</h2>
            <p class="text-sm text-purple-200 mb-6">{{ $role ?? 'UI/UX Beginner' }}</p>

            <!-- KONTAK -->
            <div class="w-full space-y-3 mb-6">
                <p class="flex items-center gap-2"><span class="font-semibold">📧</span> {{ $email ?? 'email@example.com' }}</p>
                <p class="flex items-center gap-2"><span class="font-semibold">📱</span> {{ $phone ?? '0812345678' }}</p>
                <p class="flex items-center gap-2"><span class="font-semibold">📍</span> {{ $address ?? 'Alamat domisili' }}</p>
            </div>

            <!-- SKILLS -->
            <h3 class="text-lg font-semibold mb-3">Skills</h3>
            <div class="w-full space-y-3">
                @foreach(($skills ?? ['UI Design', 'Figma', 'HTML']) as $skill)
                    <div>
                        <p class="text-sm">{{ $skill }}</p>
                        <div class="w-full bg-purple-300 rounded-full h-2 mt-1">
                            <div class="h-2 rounded-full bg-white" style="width: 80%"></div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- MAIN CONTENT -->
        <div class="col-span-2 bg-white p-8">

            <!-- PROFIL -->
            <h2 class="text-xl font-bold text-purple-700 mb-2">Profil Singkat</h2>
            <p class="text-sm text-gray-700 mb-6">
                {{ $about ?? 'Tuliskan ringkasan singkat tentang pengalaman, kemampuan, dan kepribadian profesional Anda.' }}
            </p>

            <!-- PENGALAMAN -->
            <h2 class="text-xl font-bold text-purple-700 mb-2">Pengalaman Kerja / Proyek</h2>
            <div class="space-y-4 mb-6">
                @foreach(($experiences ?? [
                    ['role' => 'UI/UX Intern', 'company' => 'Studio Design', 'year' => '2024', 'desc' => 'Membuat wireframe dan UI mobile.']
                ]) as $exp)
                    <div>
                        <p class="font-semibold text-gray-900">{{ $exp['role'] }}</p>
                        <p class="text-sm text-gray-600">{{ $exp['company'] }} • {{ $exp['year'] }}</p>
                        <p class="text-sm text-gray-700 mt-1">{{ $exp['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <!-- PENDIDIKAN -->
            <h2 class="text-xl font-bold text-purple-700 mb-2">Pendidikan</h2>
            <div class="space-y-2 mb-6">
                <p class="text-sm font-semibold">{{ $school ?? 'SMK Negeri X' }}</p>
                <p class="text-sm text-gray-600">{{ $major ?? 'Rekayasa Perangkat Lunak' }} — {{ $grad ?? 'Lulus 2024' }}</p>
            </div>

            <!-- SERTIFIKASI -->
            <h2 class="text-xl font-bold text-purple-700 mb-2">Sertifikasi</h2>
            <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                @foreach(($certs ?? ['UI/UX Dasar – 2024','Figma Basic – 2023']) as $cert)
                    <li>{{ $cert }}</li>
                @endforeach
            </ul>

        </div>

    </div>
</div>
