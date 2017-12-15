<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FamiliesTableSeeder::class,
            InstructorsTableSeeder::class,
            SeasonsTableSeeder::class
        ]);
    }
}
