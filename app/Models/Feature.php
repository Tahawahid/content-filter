<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['main_title', 'highlight_text', 'boxes'];
    protected $casts = [
        'boxes' => 'array'
    ];
}
