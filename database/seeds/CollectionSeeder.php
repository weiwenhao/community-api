<?php

use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Collection::class, 20)->create()->each(function ($collection) {
            $randomPostIds = \App\Models\Post::query()
                ->inRandomOrder()
                ->limit(mt_rand(10, \App\Models\Post::count()))
                ->pluck('id');

            $collection->posts()->sync($randomPostIds);
        });
    }
}
