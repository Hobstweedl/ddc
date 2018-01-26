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
              $season->classes()->saveMany(factory(App\Classes::class, $howManyClasses)->make(['season_id'=>$season->id]));
            }

            if ($season->SeasonType == 1) {
                foreach ($season->classes as $class) {
                    $howManyDays = rand(1, 3);
                    $input = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                    $rand_keys = array_rand($input, $howManyDays);
                    if (is_array($rand_keys)) {
                        for ($i = 0; $i < $howManyDays; $i++) {
                            $class->days()->save(factory(App\ClassDay::class)->make(['classes_id' => $class->id, 'DayHeldOn' => $input[$rand_keys[$i]]]));
                        }
                    } else {
                        $class->days()->save(factory(App\ClassDay::class)->make(['classes_id' => $class->id, 'DayHeldOn' => $input[$rand_keys]]));
                    }
                    
                }
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
