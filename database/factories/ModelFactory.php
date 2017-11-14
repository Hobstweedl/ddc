<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Season::class, function ($faker) {
    $startdate = $faker->dateTimeInInterval('now', '-1 year');
    $enddate = $faker->dateTimeInInterval($startdate, '+1 year');
    $name = $startdate->format("Y") . ' ' . $faker->randomElement($array = array('Classes', 'Sessions', 'Camps'));
    return [
        'Name' => $name,
        'StartDate' => $startdate->format('Y-m-d'),
        'EndDate' => $enddate->format('Y-m-d'),
        'Viewable' => $faker->numberBetween($min = 0, $max = 1),
        'ProrateOnEnrollment' => $faker->numberBetween($min = 0, $max = 1),
        'ChargeForHolidays' => $faker->numberBetween($min = 0, $max = 1),
        'ChargeRegistrationFee' => $faker->numberBetween($min = 0, $max = 1),
        'SeasonType' => $faker->numberBetween($min = 1, $max = 2)
    ];
});
