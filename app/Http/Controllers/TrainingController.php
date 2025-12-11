<?php

namespace App\Http\Controllers;

class TrainingController extends Controller
{
    public function index()
    {
        // Sementara pakai dummy data 15 pelatihan
        $trainings = collect(range(1, 15))->map(function ($i) {
            return (object) [
                'id' => $i,
                'title' => "Pelatihan Skill #{$i}",
                'category' => $i <= 5 ? 'Soft Skill' : ($i <= 10 ? 'Teknis' : 'Karier'),
                'level' => $i <= 5 ? 'pemula' : ($i <= 10 ? 'menengah' : 'lanjutan'),
                'short_description' => 'Deskripsi singkat pelatihan untuk meningkatkan kemampuanmu secara praktis.',
                'duration' => rand(1, 5),
                'lessons_count' => rand(8, 20),
                'progress' => rand(0, 100),
            ];
        });

        return view('skills.index', compact('trainings'));
    }
}
