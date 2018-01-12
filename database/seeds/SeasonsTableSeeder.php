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
            if ($season->SeasonType == 1) {
              $season->classes()->saveMany(factory(App\Classes::class, $howManyClasses)->make(['season_id'=>$season->id]));
            } elseif ($season->SeasonType == 2) {
              $season->classes()->saveMany(factory(App\Classes::class, $howManyClasses)->make(['season_id'=>$season->id, 'DayHeldOn'=>null, 'StartTime'=>null, 'Length'=>null ]));
            }

            if ($season->SeasonType == 2) {
                foreach ($season->classes as $class) {
                    $howManyDates = rand(1,5);
                    for ($i = 1; $i <= $howManyDates; $i++) {
                        $min = strtotime($season->StartDate);
                        $max = strtotime($season->EndDate);
                        $val = rand($min, $max);
                        $dateOfClass = date('Y-m-d', $val);
                        $class->dates()->save(factory(App\ClassDate::class)->make(['classes_id'=>$class->id, 'HeldOn'=>$dateOfClass]));
                    }
                }
            }
        }
    }
}
