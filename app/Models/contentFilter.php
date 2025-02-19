<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contentFilter extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'youtube_link',
        'token_cost',
        'status',
        'reason',
        'progress'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
