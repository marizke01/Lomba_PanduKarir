@extends('layouts.app')

@section('content')

{{-- ================= HERO ================ --}}
<section id="hero" class="relative bg-gradient-to-br from-[#faf7ff] to-[#ebe2ff] pt-28 pb-32 overflow-hidden">

  <div class="absolute inset-0 opacity-25 bg-[url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png')]"></div>
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 px-6 relative z-10">

    <div>
      <span class="px-4 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold">#1 Platform Karier Siswa SMK</span>

      <h1 class="mt-6 text-6xl font-extrabold leading-tight text-gray-900">
        Bangun Karier Tanpa Gelar
        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#5A2EFF] to-[#B36CFF]">
          Dengan SkillBridge 🔥
        </span>
      </h1>

      <p class="mt-6 text-gray-600 text-lg max-w-lg">
        Mulai dari CV, portofolio, sampai interview simulator — semua yang kamu butuhkan untuk lolos kerja pertama.
      </p>

      <div class="mt-10 flex flex-wrap gap-4">
        <a href="/register"
           class="px-8 py-4 text-white font-semibold rounded-2xl shadow-[0_8px_24px_rgba(102,51,204,.35)]
                  bg-gradient-to-r from-[#6D34F5] to-[#B46CFF] hover:scale-[1.03] transition">
          🚀 Mulai Gratis
        </a>
        <a href="/cv"
           class="px-8 py-4 border border-purple-400 hover:bg-purple-50 rounded-2xl font-semibold text-purple-600 transition">
          ✨ Coba CV Builder
        </a>
      </div>

      <div class="flex items-center gap-3 mt-9">
        <img src="https://cdn-icons-png.flaticon.com/512/1256/1256650.png" class="w-9 drop-shadow">
        <p class="text-sm text-gray-600"><span class="font-semibold text-purple-600">3500+</span> lulusan telah lolos interview</p>
      </div>
    </div>

    <div class="relative flex justify-center">
      <img src="/img/CV-1.jpg"
           class="w-[460px] rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,.15)] animate-float">

      <div class="absolute -right-8 top-20 bg-white/70 backdrop-blur-xl shadow-lg px-6 py-4 rounded-2xl text-center border border-white/40">
        <p class="text-xl font-extrabold text-purple-600">97%</p>
        <p class="text-xs text-gray-600">Lolos Interview</p>
      </div>

      <div class="absolute -left-8 bottom-16 bg-purple-600 text-white shadow-lg px-6 py-4 rounded-2xl text-center">
        <p class="text-xl font-extrabold">350+</p>
        <p class="text-xs">Lowongan Aktif</p>
      </div>
    </div>

  </div>
</section>


{{-- ================= FITUR ================ --}}
<section id="fitur" class="mt-28 px-6 max-w-7xl mx-auto">
  <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Fitur Siap Kerja</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-9">

  @php
  $fitur = [
    ['title' => 'CV Builder', 'desc' => 'Template ATS friendly + export PDF', 'img' => 'CV-1.jpg'],
    ['title' => 'Portofolio Digital', 'desc' => 'Showcase keahlian & project kamu', 'img' => 'fitur1.jpg'],
    ['title' => 'Learning Module', 'desc' => 'Belajar UI/UX, Web Dev, Marketing, dll', 'img' => 'fitur2.jpg'],
    ['title' => 'Simulasi Interview', 'desc' => 'Latihan tanya jawab HRD', 'img' => 'interview.jpg'],
    ['title' => 'Magang & Freelance', 'desc' => 'Proyek real buat pengalaman kerja', 'img' => 'magang.jpg'],
    ['title' => 'Job Matching', 'desc' => 'Rekomendasi lowongan sesuai skill', 'img' => 'job.jpg'],
  ];
  @endphp

  @foreach ($fitur as $f)
  <div class="relative group overflow-hidden rounded-3xl p-8 shadow-md hover:shadow-xl transition hover:-translate-y-1 border border-gray-200 bg-white/70">

      <div class="absolute inset-0 -z-10">
          <img src="{{ asset('img/fitur/' . $f['img']) }}"
               class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition duration-300">
      </div>

      <div class="absolute inset-0 bg-white/60"></div>

      <div class="relative z-10">
          <h4 class="text-xl font-bold text-gray-900">{{ $f['title'] }}</h4>
          <p class="mt-2 text-gray-700 text-sm">{{ $f['desc'] }}</p>
      </div>

  </div>
  @endforeach

  </div>
</section>


{{-- ================= TESTIMONIAL ================ --}}
<section id="testimoni" class="mt-32 pb-20 bg-gradient-to-b from-white to-purple-50 px-6">
  <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Cerita Pengguna ✨</h2>

  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach ([
      ['“Akhirnya diterima kerja di agency digital. CV-nya bikin keren banget!”', 'Rani — SMK RPL'],
      ['“Dapat project freelance pertama lewat micro-job. Worth it banget!”', 'Budi — SMK Multimedia'],
      ['“Interview simulator bikin aku percaya diri dan lancar pas interview asli.”', 'Siska — SMK Perbankan'],
    ] as $t)
      <div class="bg-white rounded-3xl p-7 shadow-md hover:shadow-2xl transition border border-transparent hover:border-purple-300/30">
        <p class="text-gray-700 italic">{{ $t[0] }}</p>
        <p class="mt-5 font-semibold text-purple-600">{{ $t[1] }}</p>
      </div>
    @endforeach
  </div>
</section>

@endsection
