<?php

use Illuminate\Database\Seeder;

class FamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $howManyFamilies = rand(50, 150);
        $families = factory(App\Family::class, $howManyFamilies)->create();

        foreach ($families as $family) {
            $howManyStudents = rand(1, 4);
            $family->students()->saveMany(factory(App\Student::class, $howManyStudents)->make(['Last'=>$family->Last,]));
        }

    }
}
