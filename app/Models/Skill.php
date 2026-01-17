<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'level',
        'thumbnail',
        'intro_youtube_id',
        'modules',
        'duration',
        'is_active',
    ];

    protected $casts = [
        'modules' => 'array',
        'is_active' => 'boolean',
    ];
}
