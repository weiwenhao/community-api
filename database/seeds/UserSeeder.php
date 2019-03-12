<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1; ++$i) {
            $data = factory(\App\Models\User::class)->times(3000)->make();
            \DB::table('users')->insert($data->toArray());
        }
    }
}
