<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = factory(App\Season::class, 5)->create();

        foreach ($seasons as $season) {
            $howManyClasses = rand(10, 30);
            $season->classes()->saveMany(factory(App\Classes::class, $howManyClasses)->make(['season_id'=>$season->id]));
        }
    }
}
