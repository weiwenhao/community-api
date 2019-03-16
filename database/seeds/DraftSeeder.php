<?php

use Illuminate\Database\Seeder;

class DraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Draft::class, 1)->create([
            'id' => 1,
            'user_id' => 1,
        ]);

        $data = factory(\App\Models\Draft::class)->times(2000)->make();

        \App\Models\Draft::insert($data->toArray());

        unset($data);
    }
}
