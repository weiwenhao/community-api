<?php

namespace App\Models;

class Hot30 extends Virtual
{
    public function posts()
    {
        return Post::whereIn('id', [1, 2, 3]);
    }
}
