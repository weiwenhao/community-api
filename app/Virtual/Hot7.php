<?php

namespace App\Virtual;

class Hot7 extends Virtual
{
    public function posts()
    {
        return Post::whereIn('id', [1, 2, 3]);
    }
}
