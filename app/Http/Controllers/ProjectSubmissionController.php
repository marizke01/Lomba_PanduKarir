<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'project_slug',
        'title',
        'description',
        'result_url',
        'status',
    ];

    public function project()
    {
        // project lab masih dummy → relasi opsional
        return $this->belongsTo(ProjectAssignment::class, 'project_slug', 'project_slug');
    }
}
