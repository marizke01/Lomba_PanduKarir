<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'project_lab_id',
        'project_slug',
        'title',
        'description',
        'result_url',
        'status'
    ];

    public function project()
    {
        return $this->belongsTo(ProjectLab::class, 'project_lab_id');
    }
}
