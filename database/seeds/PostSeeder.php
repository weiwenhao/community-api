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
//        for (;;) {
        $data = factory(\App\Models\Post::class)->times(1000)->make();

        \App\Models\Post::insert($data->toArray());

        unset($data);
//        }
    }
}
