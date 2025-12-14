<?php

namespace App\Http\Controllers;

use App\Models\ModuleProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * List pelatihan (Belajar Skill).
     */
    public function index(Request $request)
    {
        $courses = $this->getCourses();

        // Filter berdasarkan kategori atau level (opsional)
        $category = $request->get('category'); // contoh: Teknologi, Desain, Marketing
        $level    = $request->get('level');    // contoh: Pemula, Menengah

        $filtered = collect($courses);

        if ($category) {
            $filtered = $filtered->where('category', $category);
        }

        if ($level) {
            $filtered = $filtered->where('level', $level);
        }

        // Rekomendasi: ambil 1–2 course pertama
        $recommended = $filtered->take(2);

        return view('skills.index', [
            'courses'        => $filtered->values()->all(),
            'recommended'    => $recommended->values()->all(),
            'activeCategory' => $category,
            'activeLevel'    => $level,
        ]);
    }

    /**
     * Halaman detail pelatihan.
     */
    public function show(string $slug)
    {
        $courses = $this->getCourses();
        $course  = collect($courses)->firstWhere('slug', $slug);
        abort_if(! $course, 404);

        $userId = Auth::id();

        $progressByModule = ModuleProgress::where('user_id', $userId)
            ->where('course_slug', $slug)
            ->get()
            ->keyBy('module_index');

        $totalModules     = count($course['modules'] ?? []);
        $completedModules = $progressByModule->where('is_completed', true)->count();
        $progressPercent  = $totalModules > 0
            ? round(($completedModules / $totalModules) * 100)
            : 0;

        // Hitung jumlah video (kalau tidak ada key video_count di course)
        $videoCount = $course['video_count'] ?? collect($course['modules'] ?? [])
            ->where('type', 'video')
            ->count();

        return view('skills.show', compact(
            'course',
            'totalModules',
            'completedModules',
            'progressPercent',
            'progressByModule',
            'videoCount',
        ));
    }

    /**
     * Halaman modul tertentu.
     */
    public function module(string $slug, int $moduleIndex)
    {
        $courses = $this->getCourses();
        $course  = collect($courses)->firstWhere('slug', $slug);
        abort_if(! $course, 404);

        $modules = $course['modules'] ?? [];
        $module  = $modules[$moduleIndex] ?? null;
        abort_if(! $module, 404);

        $userId = Auth::id();

        // Progress modul ini untuk user ini
        $progress = ModuleProgress::where('user_id', $userId)
            ->where('course_slug', $slug)
            ->where('module_index', $moduleIndex)
            ->first();

        $totalModules = count($modules);
        $isLastModule = $moduleIndex === $totalModules - 1;

        return view('skills.module', [
            'course'       => $course,
            'module'       => $module,
            'moduleIndex'  => $moduleIndex,
            'progress'     => $progress,
            'totalModules' => $totalModules,
            'isLastModule' => $isLastModule,
        ]);
    }

    /**
     * Pelatihan saya (sementara ambil semua course).
     */
    public function myLearning()
    {
        $courses = $this->getCourses();

        return view('skills.my-learning', compact('courses'));
    }

    /**
     * Satu-satunya sumber data pelatihan.
     */
    public function getCourses(): array
    {
        return [

            // ==============================
            // 1. WEB DEVELOPMENT DASAR
            // ==============================
            [
                'slug'        => 'web-development-dasar',
                'title'       => 'Web Development Dasar (HTML & CSS)',
                'category'    => 'Teknologi',
                'level'       => 'Pemula',
                'duration'    => '3 jam',
                'thumbnail'   => 'https://i.ytimg.com/vi/qz0aGYrrlhU/maxresdefault.jpg',
                'description' => 'Pelatihan ini mengajarkan dasar HTML & CSS dari nol untuk membuat halaman web yang rapi, responsif, dan modern.',

                'benefits' => [
                    [
                        'title' => 'Yang akan kamu pelajari',
                        'items' => [
                            'Struktur dasar HTML untuk membangun halaman.',
                            'Mengatur tampilan dengan CSS (warna, font, layout).',
                            'Membuat halaman responsif dengan Flexbox & Grid.',
                        ],
                    ],
                    [
                        'title' => 'Cocok untuk siapa?',
                        'items' => [
                            'Pelajar SMA/SMK yang baru mulai belajar web.',
                            'Pemula yang ingin paham dasar sebelum lanjut ke JavaScript atau Laravel.',
                        ],
                    ],
                    [
                        'title' => 'Setelah selesai, kamu bisa…',
                        'items' => [
                            'Membuat landing page sederhana.',
                            'Membaca & mengedit kode HTML dan CSS dengan percaya diri.',
                        ],
                    ],
                ],

                'modules' => [
                    [
                        'title'       => 'Mengenal HTML',
                        'type'        => 'video',
                        'youtube_id'  => 'qz0aGYrrlhU',
                        'video_url'   => 'https://www.youtube.com/embed/qz0aGYrrlhU',
                        'duration'    => '15 menit',
                        'description' => 'Pengenalan HTML dan struktur dasar tag.',
                        'task' => 'Buat file index.html berisi: h1 judul, 1 paragraf perkenalan, dan list (ul) berisi 3 hobi.'
                    ],
                    [
                        'title'       => 'Dasar CSS',
                        'type'        => 'video',
                        'youtube_id'  => 'OXGznpKZ_sA',
                        'video_url'   => 'https://www.youtube.com/embed/OXGznpKZ_sA',
                        'duration'    => '20 menit',
                        'description' => 'Belajar styling dasar CSS.',
                        'task' => 'Tambahkan style.css dan ubah: warna background, font, dan buat card sederhana untuk paragraf.'
                    ],
                    [
                        'title'       => 'Mini Project: Landing Page',
                        'type'        => 'project',
                        'duration'    => '45 menit',
                        'description' => 'Membangun halaman landing page pertama kamu.',
                        'task' => 'Buat landing page sederhana (Hero + 3 benefit + tombol CTA). Kumpulkan link atau screenshot.'
                    ],
                ],
            ],

            // ==============================
            // 2. JAVASCRIPT DASAR
            // ==============================
            [
                'slug'        => 'javascript-dasar',
                'title'       => 'JavaScript Dasar untuk Pemula',
                'category'    => 'Teknologi',
                'level'       => 'Pemula',
                'duration'    => '4 jam',
                'thumbnail'   => 'https://i.ytimg.com/vi/W6NZfCO5SIk/maxresdefault.jpg',
                'description' => 'Belajar dasar JavaScript seperti variabel, fungsi, event, dan DOM untuk membuat website interaktif.',
                

                'benefits' => [
                    [
                        'title' => 'Yang akan kamu pelajari',
                        'items' => [
                            'Dasar sintaks JavaScript.',
                            'Variabel, tipe data, dan fungsi.',
                            'Event dan manipulasi DOM.',
                        ],
                    ],
                    [
                        'title' => 'Cocok untuk siapa?',
                        'items' => [
                            'Pemula yang sudah paham HTML & CSS.',
                            'SMK RPL/SI yang ingin memperkuat logika.',
                        ],
                    ],
                    [
                        'title' => 'Setelah selesai, kamu bisa…',
                        'items' => [
                            'Membuat interaksi tombol, form, dll.',
                            'Membangun mini aplikasi seperti To-Do list.',
                        ],
                    ],
                ],

                'modules' => [
                    [
                        'title'       => 'Pengenalan JavaScript',
                        'type'        => 'video',
                        'youtube_id'  => 'W6NZfCO5SIk',
                        'video_url'   => 'https://www.youtube.com/embed/W6NZfCO5SIk',
                        'duration'    => '20 menit',
                        'description' => 'Sejarah, kegunaan, dan cara kerja JavaScript.',
                        'task'        => 'Buat folder project JS. Buat file index.html + script.js. Tampilkan alert("Halo SkillBridge!") saat halaman dibuka, lalu ubah teks <h1> lewat JavaScript (document.querySelector).'
                    ],
                    [
                        'title'       => 'Variabel & Tipe Data',
                        'type'        => 'video',
                        'youtube_id'  => 'zOjov-2OZ0E',
                        'video_url'   => 'https://www.youtube.com/embed/zOjov-2OZ0E',
                        'duration'    => '25 menit',
                        'description' => 'Belajar dasar variabel & tipe data JS.',
                        'task'        => 'Di script.js buat variabel: nama, umur, hobi (array). Lalu tampilkan ke halaman dalam bentuk kalimat: "Halo, saya ... umur ... tahun, hobi saya ...".'
                    ],
                    [
                        'title'       => 'Event & DOM',
                        'type'        => 'video',
                        'youtube_id'  => '0ik6X4DJKCc',
                        'video_url'   => 'https://www.youtube.com/embed/0ik6X4DJKCc',
                        'duration'    => '30 menit',
                        'description' => 'Membuat halaman lebih interaktif.',
                        'task'        => 'Buat input + tombol "Tambah". Saat tombol diklik, ambil value input lalu tambahkan menjadi item baru ke <ul>. Setelah ditambah, kosongkan input.'
                    ],
                ],
            ],

            // ==============================
            // 3. LARAVEL PEMULA
            // ==============================
            [
                'slug'        => 'laravel-pemula',
                'title'       => 'Laravel Web Development Pemula',
                'category'    => 'Teknologi',
                'level'       => 'Pemula – Menengah',
                'duration'    => '5 jam',
                'thumbnail'   => 'https://i.ytimg.com/vi/ImtZ5yENzgE/maxresdefault.jpg',
                'description' => 'Pelatihan ini mengajarkan dasar framework Laravel mulai dari routing, controller, Blade, hingga CRUD.',

                'benefits' => [
                    [
                        'title' => 'Yang akan kamu pelajari',
                        'items' => [
                            'Dasar framework Laravel.',
                            'Routing, Controller, Blade Template.',
                            'Membuat CRUD sederhana (Create, Read, Update, Delete).',
                        ],
                    ],
                    [
                        'title' => 'Cocok untuk siapa?',
                        'items' => [
                            'Siswa SMK RPL & pemula backend.',
                            'Yang ingin membuat aplikasi web modern.',
                        ],
                    ],
                    [
                        'title' => 'Setelah selesai, kamu bisa…',
                        'items' => [
                            'Membangun aplikasi web dinamis.',
                            'Membuat fitur CRUD lengkap.',
                            'Mengembangkan aplikasi skala menengah.',
                        ],
                    ],
                ],

                'modules' => [
                    [
                        'title'       => 'Pengenalan Laravel',
                        'type'        => 'video',
                        'youtube_id'  => 'ImtZ5yENzgE',
                        'video_url'   => 'https://www.youtube.com/embed/ImtZ5yENzgE',
                        'duration'    => '25 menit',
                        'description' => 'Instalasi & konsep awal Laravel.',
                        'task'        => 'Buat project Laravel baru. Jalankan server (php artisan serve). Screenshot halaman welcome Laravel berjalan di browser + terminalnya.'
                    ],
                    [
                        'title'       => 'Routing & Controller',
                        'type'        => 'video',
                        'youtube_id'  => 'MFYzvO75Udw',
                        'video_url'   => 'https://www.youtube.com/embed/MFYzvO75Udw',
                        'duration'    => '30 menit',
                        'description' => 'Belajar alur kerja route → controller.',
                        'task'        => 'Buat route /profil yang memanggil controller (ProfilController) dan menampilkan view profil.blade.php berisi nama + sekolah. Kumpulkan screenshot hasilnya.'
                    ],
                    [
                        'title'       => 'Membuat CRUD',
                        'type'        => 'video',
                        'youtube_id'  => 'T8IqcLWCVP0',
                        'video_url'   => 'https://www.youtube.com/embed/T8IqcLWCVP0',
                        'duration'    => '40 menit',
                        'description' => 'Membangun CRUD dari awal hingga selesai.',
                        'task'        => 'Buat CRUD sederhana "Catatan" (judul, isi). Minimal bisa: tambah data + tampilkan list. Kumpulkan link repo GitHub atau screenshot halaman list + form tambah.'
                    ],
                ],
            ],

            // =========================================
            // 4. UI/UX Design untuk Aplikasi & Website
            // =========================================
            [
                'slug'        => 'uiux-design-pemula',
                'title'       => 'UI/UX Design untuk Pemula',
                'category'    => 'Desain',
                'level'       => 'Pemula',
                'duration'    => '3 jam',
                'thumbnail'   => 'https://i.ytimg.com/vi/_Hp_dI0DzY4/maxresdefault.jpg',
                'description' => 'Belajar dasar UI/UX design: cara membuat tampilan aplikasi dan website yang rapi, jelas, dan nyaman dipakai pengguna.',

                'benefits' => [
                    [
                        'title' => 'Yang akan kamu pelajari',
                        'items' => [
                            'Perbedaan UI dan UX dalam produk digital.',
                            'Prinsip dasar layout, hirarki, dan whitespace.',
                            'Membuat wireframe & simple prototype di Figma.',
                        ],
                    ],
                    [
                        'title' => 'Cocok untuk siapa?',
                        'items' => [
                            'Siswa SMA/SMK yang tertarik dunia desain digital.',
                            'Developer yang ingin memahami sudut pandang desain.',
                            'Kamu yang ingin mulai karier sebagai UI/UX Designer.',
                        ],
                    ],
                    [
                        'title' => 'Setelah selesai, kamu bisa…',
                        'items' => [
                            'Membaca dan membuat wireframe sederhana.',
                            'Mendesain satu layar aplikasi / landing page di Figma.',
                            'Mengerti alur user journey dasar dalam sebuah aplikasi.',
                        ],
                    ],
                ],

                'modules' => [
                    [
                        'title'       => 'Pengenalan UI/UX & Contoh Nyata',
                        'type'        => 'video',
                        'youtube_id'  => '_Hp_dI0DzY4',
                        'video_url'   => 'https://www.youtube.com/embed/_Hp_dI0DzY4',
                        'duration'    => '25 menit',
                        'description' => 'Memahami apa itu UI/UX dan kenapa penting untuk produk digital.',
                        'task'         => 'Cari 2 aplikasi/website: 1 yang menurutmu nyaman, 1 yang kurang nyaman. Tulis masing-masing 3 alasan singkat (contoh: warna, layout, tombol, konsistensi).'
                    ],
                    [
                        'title'       => 'Prinsip Dasar Layout & Hirarki Visual',
                        'type'        => 'video',
                        'youtube_id'  => '9B1V9cX0Quo',
                        'video_url'   => 'https://www.youtube.com/embed/9B1V9cX0Quo',
                        'duration'    => '30 menit',
                        'description' => 'Belajar tentang grid, spacing, alignment, dan fokus perhatian pengguna.',
                        'task'         => 'Buat wireframe 1 layar landing page (Hero + 3 benefit + testimonial/CTA). Boleh di kertas (foto) atau di Figma (screenshot).'
                    ],
                    [
                        'title'       => 'Wireframe & Prototype Sederhana di Figma',
                        'type'        => 'project',
                        'duration'    => '40 menit',
                        'description' => 'Membuat wireframe sederhana untuk halaman mobile / web dan dijadikan prototype klik.',
                        'task'         => 'Buat 3 layar (Home, Detail, Checkout/Login). Hubungkan jadi prototype (klik tombol berpindah layar). Kumpulkan link Figma.'
                    ],
                ],
            ],

            // 5. UI/UX Landing Page
            [
                'slug'        => 'uiux-landingpage-dasar',
                'title'       => 'UI/UX Design: Membuat Landing Page Modern',
                'category'    => 'Desain',
                'level'       => 'Pemula – Menengah',
                'duration'    => '4 jam',
                'thumbnail'   => 'https://i.ytimg.com/vi/5gRhhjFnt2w/hqdefault.jpg',
                'description' => 'Belajar membuat landing page modern dengan prinsip UI/UX yang benar.',

                'benefits' => [
                    [
                        'title' => 'Yang akan kamu pelajari',
                        'items' => [
                            'Menganalisis contoh landing page yang bagus & buruk.',
                            'Membuat struktur hero, benefit, dan CTA yang jelas.',
                            'Mengatur tipografi, warna, dan visual agar profesional.',
                        ],
                    ],
                    [
                        'title' => 'Cocok untuk siapa?',
                        'items' => [
                            'UI/UX pemula yang ingin portofolio.',
                            'Front-end dev yang ingin memahami sisi desain.',
                        ],
                    ],
                    [
                        'title' => 'Setelah selesai, kamu bisa…',
                        'items' => [
                            'Membuat 1 landing page utuh untuk produk/jasa.',
                            'Menjelaskan keputusan desainmu ke orang lain (client/dosen).',
                        ],
                    ],
                ],

                'modules' => [
                    [
                        'title'       => 'Dasar UI/UX & Wireframing',
                        'type'        => 'video',
                        'youtube_id'  => '5gRhhjFnt2w',
                        'video_url'   => 'https://www.youtube.com/embed/5gRhhjFnt2w',
                        'duration'    => '30 menit',
                        'description' => 'Belajar memulai dari sketsa/wireframe sebelum desain final.',
                        'task'         => 'Tentukan 1 produk/jasa (contoh: kursus, makanan, jasa desain). Buat wireframe landing page: Hero, Benefit, Harga/Promo, CTA. (kertas/Figma).'
                    ],
                    [
                        'title'       => 'Membuat Layout Landing Page Modern',
                        'type'        => 'video',
                        'youtube_id'  => 'u1Z5BtqR0g8',
                        'video_url'   => 'https://www.youtube.com/embed/u1Z5BtqR0g8',
                        'duration'    => '35 menit',
                        'description' => 'Desain hero section, card, CTA, dan visual lainnya.',
                        'task'         => 'Ubah wireframe menjadi desain visual 1 layar (warna, font, card, tombol). Pastikan ada 1 CTA yang jelas. Kumpulkan screenshot atau link Figma.'
                    ],
                    [
                        'title'       => 'Mini Project: Landing Page Portfolio',
                        'type'        => 'project',
                        'duration'    => '1 jam',
                        'description' => 'Membuat 1 landing page utuh untuk portofolio UI/UX.',
                        'task'         => 'Selesaikan landing page full (minimal 5 section). Export sebagai PNG/PDF atau share link Figma. Kumpulkan link/file.'
                    ],
                ],
            ],

            // ==============================
            // 6. UI/UX Wireframing Pemula
            // ==============================
            [
                'slug'        => 'uiux-wireframing-pemula',
                'title'       => 'UI/UX Wireframing untuk Pemula',
                'category'    => 'Desain',
                'level'       => 'Pemula – Menengah',
                'duration'    => '3 jam',
                'thumbnail'   => 'https://i.ytimg.com/vi/c9Wg6Cb_YlU/hqdefault.jpg',
                'description' => 'Belajar membuat wireframe dan alur sederhana untuk aplikasi / website sebelum masuk ke desain final.',

                'benefits' => [
                    [
                        'title' => 'Yang akan kamu pelajari',
                        'items' => [
                            'Konsep dasar UI/UX dan user flow.',
                            'Membuat wireframe low-fidelity di kertas / Figma.',
                            'Menyusun layout halaman utama aplikasi.',
                        ],
                    ],
                    [
                        'title' => 'Cocok untuk siapa?',
                        'items' => [
                            'Pemula yang tertarik ke UI/UX design.',
                            'Web / mobile dev yang ingin paham sisi desain.',
                        ],
                    ],
                    [
                        'title' => 'Setelah selesai, kamu bisa…',
                        'items' => [
                            'Membuat wireframe untuk 3–5 layar aplikasi.',
                            'Menjelaskan alur penggunaan aplikasi ke orang lain.',
                        ],
                    ],
                ],

                'modules' => [
                    [
                        'title'       => 'Dasar UI/UX & Wireframe',
                        'type'        => 'video',
                        'youtube_id'  => 'c9Wg6Cb_YlU',
                        'video_url'   => 'https://www.youtube.com/embed/c9Wg6Cb_YlU',
                        'duration'    => '25 menit',
                        'description' => 'Perbedaan UI dan UX, dan kenapa wireframe penting.',
                        'task'         => 'Pilih ide aplikasi sederhana (To-Do, Absensi, Kasir, Jadwal Belajar). Tulis 3 fitur utama + buat sketsa 1 layar Home (wireframe).'
                    ],
                    [
                        'title'       => 'Membuat Wireframe di Figma',
                        'type'        => 'video',
                        'youtube_id'  => 'c9F5mCq2Eu8',
                        'video_url'   => 'https://www.youtube.com/embed/c9F5mCq2Eu8',
                        'duration'    => '30 menit',
                        'description' => 'Praktik membuat wireframe low-fidelity di Figma.',
                        'task'         => 'Buat 3 wireframe low-fidelity di Figma: Home, List, Detail. Fokus ke layout & hirarki (tanpa warna dulu). Kumpulkan link/screenshot.'
                    ],
                    [
                        'title'       => 'Mini Project: Wireframe Aplikasi To-Do',
                        'type'        => 'project',
                        'duration'    => '40 menit',
                        'description' => 'Membuat wireframe beberapa layar untuk aplikasi To-Do sederhana.',
                        'task'         => 'Lengkapi 5 layar: Login, Home, Tambah Tugas, Detail Tugas, Selesai. Rapikan alignment & spacing. Kumpulkan link Figma.'
                    ],
                ],
            ],

            // ==============================
    // MARKETING 1: DIGITAL MARKETING DASAR
    // ==============================
    [
        'slug'        => 'digital-marketing-dasar',
        'title'       => 'Digital Marketing Dasar untuk Pemula',
        'category'    => 'Marketing',
        'level'       => 'Pemula',
        'duration'    => '3 jam',
        'thumbnail'   => 'https://i.ytimg.com/vi/z-uSvhg_-20/maxresdefault.jpg',
        'description' => 'Belajar pondasi digital marketing: channel, funnel sederhana, persona, dan dasar SEO untuk mulai promosi online dengan benar.',

        'benefits' => [
            [
                'title' => 'Yang akan kamu pelajari',
                'items' => [
                    'Konsep channel marketing (search, social, content).',
                    'Buyer persona & tujuan promosi.',
                    'Dasar funnel & CTA yang jelas.',
                    'Dasar SEO untuk pemula.',
                ],
            ],
            [
                'title' => 'Cocok untuk siapa?',
                'items' => [
                    'UMKM yang baru mulai promosi online.',
                    'Pemula yang ingin masuk dunia digital marketing.',
                    'Pelajar/mahasiswa yang butuh skill praktis.',
                ],
            ],
            [
                'title' => 'Setelah selesai, kamu bisa…',
                'items' => [
                    'Menyusun rencana promosi sederhana.',
                    'Menentukan target audiens & pesan utama.',
                    'Membuat checklist marketing mingguan.',
                ],
            ],
        ],

        'modules' => [
            [
                'title'       => 'Pengenalan Digital Marketing (Dasar)',
                'type'        => 'video',
                'youtube_id'  => 'z-uSvhg_-20',
                'video_url'   => 'https://www.youtube.com/embed/z-uSvhg_-20',
                'duration'    => '25 menit',
                'description' => 'Gambaran besar digital marketing, channel, dan cara memulai.',
                'task'         => 'Tulis 1 produk/jasa yang ingin kamu promosikan + 1 target audiensnya (siapa, masalahnya apa, ingin hasil apa).'
            ],
            [
                'title'       => 'Membuat Buyer Persona',
                'type'        => 'video',
                'youtube_id'  => 'UAbVYRyYktY',
                'video_url'   => 'https://www.youtube.com/embed/UAbVYRyYktY',
                'duration'    => '15 menit',
                'description' => 'Cara cepat menyusun persona agar kontenmu tepat sasaran.',
                'task'         => 'Buat 1 buyer persona singkat (nama, umur, kebutuhan, pain point, platform favorit).'
            ],
            [
                'title'       => 'Dasar SEO untuk Pemula',
                'type'        => 'video',
                'youtube_id'  => 'rpwD50v0Ubo',
                'video_url'   => 'https://www.youtube.com/embed/rpwD50v0Ubo',
                'duration'    => '20 menit',
                'description' => 'Pondasi SEO: keyword, intent, dan struktur konten.',
                'task'         => 'Cari 5 keyword yang relevan untuk produkmu + tulis 1 judul artikel/landing page yang cocok.'
            ],
        ],
    ],

    // ==============================
    // MARKETING 2: SOCIAL MEDIA MARKETING UNTUK UMKM
    // ==============================
    [
        'slug'        => 'social-media-marketing-umkm',
        'title'       => 'Social Media Marketing untuk UMKM',
        'category'    => 'Marketing',
        'level'       => 'Pemula – Menengah',
        'duration'    => '3.5 jam',
        'thumbnail'   => 'https://i.ytimg.com/vi/yb1tjeq67_w/maxresdefault.jpg',
        'description' => 'Belajar strategi konten, engagement, dan evaluasi performa agar akun bisnis kamu makin rapi dan efektif.',

        'benefits' => [
            [
                'title' => 'Yang akan kamu pelajari',
                'items' => [
                    'Membuat pilar konten (edukasi, promo, bukti sosial).',
                    'Hook & struktur caption sederhana.',
                    'Dasar metrik: reach, engagement, CTR.',
                ],
            ],
            [
                'title' => 'Cocok untuk siapa?',
                'items' => [
                    'UMKM yang ingin jualan lewat Instagram/TikTok.',
                    'Admin sosial media pemula.',
                    'Content creator yang ingin lebih terarah.',
                ],
            ],
            [
                'title' => 'Setelah selesai, kamu bisa…',
                'items' => [
                    'Bikin kalender konten 14 hari.',
                    'Tahu konten mana yang perlu diulang/ditingkatkan.',
                    'Membuat CTA yang lebih jelas untuk jualan.',
                ],
            ],
        ],

        'modules' => [
            [
                'title'       => 'Dasar Social Media Marketing',
                'type'        => 'video',
                'youtube_id'  => 'yb1tjeq67_w',
                'video_url'   => 'https://www.youtube.com/embed/yb1tjeq67_w',
                'duration'    => '20 menit',
                'description' => 'Prinsip dasar strategi konten & engagement.',
                'task'         => 'Tentukan 3 pilar konten untuk bisnismu (edukasi/promo/bukti sosial) + contoh 2 ide posting tiap pilar.'
            ],
            [
                'title'       => 'Membuat Konten yang Menarik (Praktik)',
                'type'        => 'video',
                'youtube_id'  => 'LXFtOs3qn7o',
                'video_url'   => 'https://www.youtube.com/embed/LXFtOs3qn7o',
                'duration'    => '25 menit',
                'description' => 'Cara menyusun konten agar konsisten dan tidak random.',
                'task'         => 'Buat 5 ide konten (judul + poin) untuk 1 minggu.'
            ],
            [
                'title'       => 'Mini Project: Kalender Konten 14 Hari',
                'type'        => 'project',
                'duration'    => '45 menit',
                'description' => 'Susun jadwal posting 14 hari (format: tanggal, jenis konten, topik, CTA).',
                'task'         => 'Kumpulkan kalender konten 14 hari (link Google Docs/Sheet atau file).'
            ],
        ],
    ],

    // ==============================
    // MARKETING 3: COPYWRITING DASAR
    // ==============================
    [
        'slug'        => 'copywriting-dasar',
        'title'       => 'Copywriting Dasar untuk Iklan & Konten',
        'category'    => 'Marketing',
        'level'       => 'Pemula',
        'duration'    => '2.5 jam',
        'thumbnail'   => 'https://i.ytimg.com/vi/8YWbVJNmsq8/maxresdefault.jpg',
        'description' => 'Belajar menulis caption, headline, dan copy iklan yang jelas, enak dibaca, dan mendorong orang untuk action.',

        'benefits' => [
            [
                'title' => 'Yang akan kamu pelajari',
                'items' => [
                    'Cara menulis headline yang menarik.',
                    'Framework AIDA & PAS untuk iklan.',
                    'Copy singkat untuk IG/landing page.',
                ],
            ],
            [
                'title' => 'Cocok untuk siapa?',
                'items' => [
                    'UMKM/penjual online.',
                    'Admin sosial media & content creator.',
                    'Pemula yang ingin jago nulis promosi.',
                ],
            ],
            [
                'title' => 'Setelah selesai, kamu bisa…',
                'items' => [
                    'Membuat 3 versi caption yang lebih rapi.',
                    'Menulis copy iklan singkat yang jelas CTA-nya.',
                    'Menyusun struktur landing page sederhana.',
                ],
            ],
        ],

        'modules' => [
            [
                'title'       => 'Dasar Copywriting untuk Pemula',
                'type'        => 'video',
                'youtube_id'  => '8YWbVJNmsq8',
                'video_url'   => 'https://www.youtube.com/embed/8YWbVJNmsq8',
                'duration'    => '20 menit',
                'description' => 'Pondasi copywriting dan contoh penerapannya.',
                'task'         => 'Tulis 10 headline untuk 1 produk (pilih 3 terbaik).'
            ],
            [
                'title'       => 'Framework AIDA & PAS',
                'type'        => 'video',
                'youtube_id'  => 'zrHH-BDeCDc',
                'video_url'   => 'https://www.youtube.com/embed/zrHH-BDeCDc',
                'duration'    => '25 menit',
                'description' => 'Cara bikin copy terstruktur yang lebih persuasif.',
                'task'         => 'Buat 1 iklan dengan AIDA + 1 iklan dengan PAS untuk produk yang sama.'
            ],
            [
                'title'       => 'Mini Project: Paket Copy untuk Produk',
                'type'        => 'project',
                'duration'    => '35 menit',
                'description' => 'Buat 1 hook, 1 caption IG, dan 1 copy iklan singkat lengkap CTA.',
                'task'         => 'Kumpulkan link dokumen berisi hook + caption + iklan (atau upload file).'
            ],
        ],
    ],

        ];
    }
}
