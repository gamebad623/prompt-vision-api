<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    protected $fillable = [
        'user_id',
        'image_path',
        'prompt',
        'metadata'
    ];
    protected $casts = [
        'metadata' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
