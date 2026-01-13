<?php

namespace App\Http\Controllers;

use App\Models\ProjectAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectLabController extends Controller
{
    /**
     * Data dummy project Project Lab.
     * Nanti kalau sudah pakai database, ini bisa dipindahkan ke tabel.
     */
    private array $projects = [
        [
            'slug' => 'landing-page-umkm-kopi',
            'title' => 'Landing Page UMKM Kopi',
            'difficulty' => 'Pemula',
            'category' => 'Web Development',
            'company_name' => 'Kopi Senja Nusantara',
            'thumbnail' => 'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&w=1600&q=80',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=Project+Lab',
            'short_description' => 'Buat landing page sederhana untuk usaha kopi lokal dengan informasi produk dan kontak.',
            'goal' => 'Membantu UMKM kopi punya presence online sederhana untuk promosi di sosial media.',
            'estimated_duration' => '2–3 hari',
            'deliverables' => [
                '1 halaman landing page responsif (HTML/CSS).',
                'Bagian hero, tentang, daftar produk, dan kontak.',
                'Tampilan rapi di mobile & desktop.',
            ],
            'requirements' => [
                'Mengerti HTML dan CSS dasar.',
                'Paham layout sederhana (flexbox / grid).',
                'Boleh pakai framework CSS (Tailwind/Bootstrap).',
            ],
            'skills_tags' => ['HTML', 'CSS', 'Responsive Design'],
            'reward' => 'Masuk portofolio + poin pengalaman “Web Dev Dasar”.',
        ],
        [
            'slug' => 'poster-event-sekolah',
            'title' => 'Poster Event Sekolah Kreatif',
            'difficulty' => 'Pemula',
            'category' => 'Desain Grafis',
            'company_name' => 'OSIS SMK Kreatif Bangsa',
            'thumbnail' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=1600&q=80',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=Project+Lab',
            'short_description' => 'Desain poster untuk event sekolah bertema kreatif dan ramah pelajar.',
            'goal' => 'Menyebarkan informasi event sekolah dengan cara yang menarik dan mudah dibaca.',
            'estimated_duration' => '1–2 hari',
            'deliverables' => [
                'Poster ukuran A4/A3 (format PNG/JPG).',
                'Mengandung judul event, tanggal, lokasi, dan CTA.',
                'Desain rapi, warna nyaman, teks mudah dibaca.',
            ],
            'requirements' => [
                'Bisa menggunakan tools desain (Canva/Figma/Photoshop).',
                'Punya sense pemilihan warna & tipografi.',
            ],
            'skills_tags' => ['Desain Grafis', 'Tipografi', 'Layout'],
            'reward' => 'Masuk portofolio + poin pengalaman “Desain Dasar”.',
        ],
        [
            'slug' => 'caption-produk-umkm',
            'title' => 'Caption Produk UMKM untuk Instagram',
            'difficulty' => 'Pemula',
            'category' => 'Copywriting',
            'company_name' => 'UMKM Snack Rumahan “EnakBite”',
            'thumbnail' => 'https://images.unsplash.com/photo-1557838923-2985c318be48?auto=format&fit=crop&w=1600&q=80',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=Project+Lab',
            'short_description' => 'Tulis beberapa caption promosi untuk produk snack rumahan di Instagram.',
            'goal' => 'Membantu UMKM menjelaskan kelebihan produknya dengan bahasa yang menarik dan sederhana.',
            'estimated_duration' => '1 hari',
            'deliverables' => [
                '3–5 caption Instagram untuk produk yang berbeda.',
                'Gaya bahasa santai tapi sopan, cocok untuk anak muda.',
                'Setiap caption ada CTA (ajak beli/DM/order).',
            ],
            'requirements' => [
                'Suka menulis dan aktif di sosial media.',
                'Paham cara komunikasi yang natural untuk anak muda.',
            ],
            'skills_tags' => ['Copywriting', 'Social Media', 'Marketing'],
            'reward' => 'Masuk portofolio + poin pengalaman “Copywriting Dasar”.',
        ],
        [
            'slug' => 'uiux-case-study-aplikasi-edukasi',
            'title' => 'UI/UX Case Study Aplikasi Edukasi',
            'difficulty' => 'pemula',
            'category' => 'UI/UX Design',
            'company_name' => 'Startup EduTech Learnify',
            'thumbnail' => 'https://images.unsplash.com/photo-1621111848501-8d3634f82336?q=80&w=1265&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=UI%2FUX+Project',
            'short_description' => 'Membuat studi kasus UI/UX aplikasi edukasi dari problem sampai solusi desain.',
            'goal' => 'Melatih kemampuan berpikir user-centered dan problem solving dalam desain.',
            'estimated_duration' => '3–4 hari',
            'deliverables' => [
                'Problem statement & user persona.',
                'User flow dan wireframe.',
                'Mockup final (Figma).',
                'Ringkasan insight & solusi.',
            ],
            'requirements' => [
                'Mengerti dasar UI/UX.',
                'Bisa menggunakan Figma.',
            ],
            'skills_tags' => ['UI/UX', 'Figma', 'User Research'],
            'reward' => 'Portofolio UI/UX + poin pengalaman desain.',
        ],
        [
            'slug' => 'data-entry-cleaning-excel',
            'title' => 'Data Entry & Cleaning Menggunakan Excel',
            'difficulty' => 'Pemula',
            'category' => 'Data',
            'company_name' => 'Perusahaan Distribusi Lokal',
            'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=Data+Project',
            'short_description' => 'Membersihkan dan merapikan data penjualan menggunakan Excel.',
            'goal' => 'Melatih ketelitian dan pengolahan data dasar.',
            'estimated_duration' => '1–2 hari',
            'deliverables' => [
                'File Excel rapi & konsisten.',
                'Penghapusan data duplikat.',
                'Format data siap analisis.',
            ],
            'requirements' => [
                'Mengerti Excel dasar.',
            ],
            'skills_tags' => ['Excel', 'Data Cleaning', 'Data Entry'],
            'reward' => 'Pengalaman data + portofolio dasar.',
        ],
        [
            'slug' => 'ui-cv-digital',
            'title' => 'Desain UI CV Digital Profesional',
            'difficulty' => 'Pemula',
            'category' => 'UI/UX Design',
            'company_name' => 'Startup HR Digital',
            'thumbnail' => 'https://images.unsplash.com/photo-1602407294553-6ac9170b3ed0?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=Project+Lab',
            'short_description' => 'Membuat tampilan CV digital yang rapi, profesional, dan mudah dibaca.',
            'goal' => 'Melatih kemampuan desain UI untuk kebutuhan rekrutmen modern.',
            'estimated_duration' => '2 hari',
            'deliverables' => [
                '1 halaman desain CV digital.',
                'Struktur jelas: profil, skill, pengalaman, pendidikan.',
                'Desain rapi dan konsisten.',
            ],
            'requirements' => [
                'Menggunakan Figma / Canva.',
                'Paham layout dasar dan tipografi.',
            ],
            'skills_tags' => ['UI Design', 'CV', 'Layout'],
            'reward' => 'Masuk portofolio + poin pengalaman “UI Dasar”.',
        ],
        [
            'slug' => 'dashboard-penjualan-sederhana',
            'title' => 'Dashboard Data Penjualan Sederhana',
            'difficulty' => 'Pemula',
            'category' => 'Data Visualisasi',
            'company_name' => 'Toko Retail Lokal',
            'thumbnail' => 'https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?q=80&w=1106&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=Data+Visualization',
            'short_description' => 'Membuat visualisasi data penjualan sederhana agar mudah dipahami.',
            'goal' => 'Membantu pemilik usaha memahami performa penjualan lewat grafik.',
            'estimated_duration' => '2–3 hari',
            'deliverables' => [
                'Dashboard berisi minimal 3 grafik.',
                'Grafik penjualan per waktu.',
                'Grafik produk terlaris.',
            ],
            'requirements' => [
                'Memahami data tabel sederhana.',
                'Menggunakan Excel, Google Sheets, atau tools visualisasi.',
            ],
            'skills_tags' => ['Data Visualization', 'Chart', 'Analisis Data'],
            'reward' => 'Masuk portofolio + poin pengalaman “Data Dasar”.',
        ],
        [
            'slug' => 'aplikasi-profil-sederhana-flutter',
            'title' => 'Aplikasi Profil Sederhana dengan Flutter',
            'difficulty' => 'Pemula',
            'category' => 'Mobile Development',
            'company_name' => 'Startup Edukasi',
            'thumbnail' => 'https://images.unsplash.com/photo-1617040619263-41c5a9ca7521?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=Flutter',
            'short_description' => 'Membuat aplikasi mobile sederhana berisi halaman profil.',
            'goal' => 'Melatih pemahaman dasar Flutter dan widget.',
            'estimated_duration' => '3–4 hari',
            'deliverables' => [
                '1 halaman profil.',
                'Menggunakan widget dasar Flutter.',
                'Tampilan rapi dan responsif.',
            ],
            'requirements' => [
                'Sudah install Flutter SDK.',
                'Mengerti konsep widget.',
            ],
            'skills_tags' => ['Flutter', 'Dart', 'Mobile UI'],
            'reward' => 'Masuk portofolio + poin pengalaman “Flutter Dasar”.',
        ],
        [
            'slug' => 'analisis-kebutuhan-aplikasi',
            'title' => 'Analisis Kebutuhan Aplikasi Sederhana',
            'difficulty' => 'Pemula',
            'category' => 'Rekayasa Perangkat Lunak',
            'company_name' => 'Tim Pengembang Internal',
            'thumbnail' => 'https://images.unsplash.com/photo-1662638600507-0846616ec508?q=80&w=1330&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'fallback_thumbnail' => 'https://placehold.co/1200x675?text=Software+Engineering',
            'short_description' => 'Menyusun kebutuhan sistem dari studi kasus sederhana.',
            'goal' => 'Melatih berpikir sistematis sebelum membangun aplikasi.',
            'estimated_duration' => '2 hari',
            'deliverables' => [
                'Dokumen kebutuhan sistem.',
                'Daftar fitur utama.',
                'Diagram sederhana (opsional).',
            ],
            'requirements' => [
                'Mengerti konsep dasar sistem.',
                'Mampu menganalisis masalah.',
            ],
            'skills_tags' => ['Analisis Sistem', 'RPL', 'Dokumentasi'],
            'reward' => 'Masuk portofolio + poin pengalaman “RPL Dasar”.',
        ],

   ];

    /**
     * Halaman list semua project lab.
     */
    public function index(Request $request)
    {
        $projects = $this->projects;

        // Ambil slug project yang sudah disubmit user
        $submittedSlugs = [];
        if (Auth::check()) {
            $submittedSlugs = ProjectAssignment::where('user_id', Auth::id())
                ->whereNotNull('submission_url')
                ->orWhereNotNull('submission_file_path')
                ->orWhereNotNull('submission_image_path')
                ->orWhereNotNull('notes')
                ->pluck('project_slug')
                ->toArray();
        }

        // 🔍 Search (kalau ada)
        if ($q = $request->q) {
            $projects = array_filter($projects, function ($p) use ($q) {
                return str_contains(strtolower($p['title']), strtolower($q))
                    || str_contains(strtolower($p['category']), strtolower($q));
            });
        }

        return view('projects.index', [
            'projects' => $projects,
            'submittedSlugs' => $submittedSlugs,
        ]);
    }


    /**
     * Halaman detail satu project.
     * Sekaligus cek progress assignment user kalau sudah ambil.
     */
    public function show(string $slug)
    {
        $project = collect($this->projects)->firstWhere('slug', $slug);

        if (! $project) {
            abort(404);
        }

        $assignment = null;
        if (Auth::check()) {
            $assignment = ProjectAssignment::where('user_id', Auth::id())
                ->where('project_slug', $slug)
                ->first();
        }

        return view('projects.show', compact('project', 'assignment'));
    }
}
