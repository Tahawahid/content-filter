<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['main_text', 'special_text', 'images'];
    protected $casts = [
        'images' => 'array'
    ];
}
