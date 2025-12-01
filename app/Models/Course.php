<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // 'trainer_id',
        'name',
        'desc',
    ];

    // Relasi dengan model User dengan role trainer (Nanti Dipakai)
        // public function trainer()
        // {
        //     return $this->belongsTo(User::class, 'trainer_id');
        // }

    // Relasi dengan model Category (Nanti Dipakai)
        // public function categories()
        // {
        //     return $this->belongsTo(CourseCategory::class, 'category_id');
        // }
}
