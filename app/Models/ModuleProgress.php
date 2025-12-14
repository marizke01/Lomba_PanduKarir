<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModuleProgress extends Model
{
    // penting: pastikan ini plural
    protected $table = 'module_progresses';

     protected $fillable = [
        'user_id',
        'course_slug',
        'module_index',
        'is_completed',
        'completed_at',
        'submission_url',
        'submission_file_path',
        'notes',
        'status',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'completed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
