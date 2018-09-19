<?php

namespace App\Models;

class CommentReply extends Model
{
    protected $casts = [
        'call_user' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
