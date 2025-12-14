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
    ];

    /**
     * Halaman list semua project lab.
     */
    public function index()
    {
        $projects = $this->projects;

        return view('projects.index', compact('projects'));
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
