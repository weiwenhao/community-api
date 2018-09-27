<?php

namespace App\Virtual;

use App\Models\Post;

class Hot7 extends Virtual
{
    public function posts()
    {
        return Post::whereIn('id', [1, 2, 3]);
    }
}
