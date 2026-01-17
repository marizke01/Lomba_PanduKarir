<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'level' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'intro_youtube_id' => 'nullable|string',
            'duration' => 'nullable|string',
            'modules' => 'nullable|array',
        ]);

        // olah modules
        if (!empty($data['modules'])) {
            $data['modules'] = collect($data['modules'])->map(function ($m) {
                return [
                    'title' => $m['title'],
                    'type' => 'video',
                    'youtube_id' => $m['youtube_id'] ?? null,
                    'duration' => $m['duration'] ?? null,
                    'task' => $m['task'] ?? null,
                    'points' => isset($m['points'])
                        ? array_filter(array_map('trim', explode("\n", $m['points'])))
                        : [],
                ];
            })->values()->toArray();
        }

        Skill::create([
            ...$data,
            'slug' => Str::slug($data['title']),
            'is_active' => true,
        ]);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil ditambahkan');
    }


    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'level' => 'required|string',
            'thumbnail' => 'nullable|string',
            'intro_youtube_id' => 'nullable|string',
            'duration' => 'nullable|string',
            'modules' => 'nullable|array',
            'modules.*.title' => 'required|string',
            'modules.*.youtube_id' => 'nullable|string',
            'modules.*.duration' => 'nullable|string',
            'modules.*.task' => 'nullable|string',
            'modules.*.points' => 'nullable|string',
            'is_active' => 'sometimes',
        ]);

        if (!empty($data['modules'])) {
            $data['modules'] = collect($data['modules'])->map(function ($m) {
                return [
                    'title' => $m['title'],
                    'type' => 'video',
                    'youtube_id' => $m['youtube_id'] ?? null,
                    'duration' => $m['duration'] ?? null,
                    'task' => $m['task'] ?? null,
                    'points' => isset($m['points'])
                        ? array_filter(array_map('trim', explode("\n", $m['points'])))
                        : [],
                ];
            })->values()->toArray();
        }

        $skill->update([
            ...$data,
            'slug' => Str::slug($data['title']),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil diperbarui');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus');
    }
}

