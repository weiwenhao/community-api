<?php

namespace App\Models;

class CommentReply extends Model
{
    protected $casts = [
        'call_user' => 'array'
    ];
}
