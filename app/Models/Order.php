<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_detail_id',
        'package_id',
        'price',
        'status',
        'total',
        'tokens'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userDetail()
    {
        return $this->belongsTo(UserDetail::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
