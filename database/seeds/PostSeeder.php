<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = factory(\App\Models\Post::class)->times(100)->make();

        \App\Models\Post::insert($data->toArray());
    }
}
