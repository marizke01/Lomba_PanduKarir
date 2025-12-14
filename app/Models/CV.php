<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{

    protected $table = 'cvs';

    protected $fillable = [
    'user_id',
    'phone',
    'location',
    'about',
    'education',
    'experience',
    'skills',
    'links',
    'hobbies',
    'position',
    'photo_url',
];

protected $casts = [
    'education' => 'array',
    'experience' => 'array',
    'skills' => 'array',
    'links' => 'array',
];


    public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

}
