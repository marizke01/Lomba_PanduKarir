<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    // Data dummy course dulu (nanti bisa dipindah ke database)
    private array $courses = [
        [
            'slug' => 'web-development-dasar',
            'title' => 'Web Development Dasar',
            'thumbnail' => 'https://source.unsplash.com/600x400/?coding,html',
            'level' => 'Beginner',
            'category' => 'Teknologi',
            'duration' => '6 video · ± 2 jam',
            'short_description' => 'Belajar dasar HTML & CSS untuk membuat website sederhana.',
            'intro_video_url' => 'https://www.youtube.com/embed/dD2EISBDjWM',
            'modules' => [
                ['title' => 'Pengenalan Website', 'duration' => '10 menit'],
                ['title' => 'Dasar HTML', 'duration' => '15 menit'],
                ['title' => 'Dasar CSS', 'duration' => '18 menit'],
                ['title' => 'Flexbox Layout', 'duration' => '20 menit'],
                ['title' => 'Mini Project Website UMKM', 'duration' => '25 menit'],
            ],
        ],
        [
            'slug' => 'ui-ux-design-pemula',
            'title' => 'UI/UX Design untuk Pemula',
            'thumbnail' => 'https://source.unsplash.com/600x400/?uiux,design',
            'level' => 'Beginner',
            'category' => 'Desain',
            'duration' => '5 video · ± 1.5 jam',
            'short_description' => 'Belajar membuat tampilan aplikasi yang rapi dan nyaman dipakai.',
            'intro_video_url' => 'https://www.youtube.com/embed/_8Mla3v6pG0',
            'modules' => [
                ['title' => 'Apa itu UI/UX', 'duration' => '10 menit'],
                ['title' => 'Layout & Grid', 'duration' => '15 menit'],
                ['title' => 'Warna & Tipografi', 'duration' => '18 menit'],
                ['title' => 'Wireframe Dasar', 'duration' => '20 menit'],
                ['title' => 'Desain Landing Page', 'duration' => '25 menit'],
            ],
        ],
        [
            'slug' => 'copywriting-produk-online',
            'title' => 'Copywriting Produk Online',
            'thumbnail' => 'https://source.unsplash.com/600x400/?copywriting,marketing',
            'level' => 'Beginner',
            'category' => 'Marketing',
            'duration' => '4 video · ± 1 jam',
            'short_description' => 'Belajar menulis kata-kata yang membuat orang tertarik membeli.',
            'intro_video_url' => 'https://www.youtube.com/embed/kW_4jvQqKXk',
            'modules' => [
                ['title' => 'Dasar AIDA & PAS', 'duration' => '12 menit'],
                ['title' => 'Headline yang Menarik', 'duration' => '15 menit'],
                ['title' => 'Copy untuk Landing Page', 'duration' => '18 menit'],
                ['title' => 'Mini Project Menulis Copy UMKM', 'duration' => '20 menit'],
            ],
        ],
    ];

    // list semua course
    public function index()
    {
        // ambil data dari property di atas
        $courses = $this->courses;

        // kirim ke view skills.index SEBAGAI $courses
        return view('skills.index', compact('courses'));
        // sama saja dengan: return view('skills.index', ['courses' => $courses]);
    }

    // detail satu course
    public function show(string $slug)
    {
        $course = collect($this->courses)->firstWhere('slug', $slug);

        if (! $course) {
            abort(404);
        }

        return view('skills.show', compact('course'));
    }
}
