<?php

use Illuminate\Database\Seeder;

class InstructorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $howManyInstructors = rand(3, 20);
        factory(App\Instructor::class, $howManyInstructors)->create();

    }
}
