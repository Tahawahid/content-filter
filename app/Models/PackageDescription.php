<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDescription extends Model
{
    protected $fillable = [
        'package_id',
        'description',
    ];
}
