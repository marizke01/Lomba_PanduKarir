<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cv extends Model
{
    protected $fillable = ['user_id','template','name','email','phone','education','experience','skills'];

    public function user(): BelongsTo {
        return $this->belongsTo(\App\Models\User::class);
    }
}
