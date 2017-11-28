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

$factory->define(App\Family::class, function ($faker) {
    return [
        'First' => $faker->firstName,
        'Last' => $faker->lastName,
        'Email' => $faker->safeEmail,
        'Password' => $faker->password,
        'OptOut' => $faker->optional(0.2, 0)->numberBetween($min = 0, $max = 1),
        'HowDidYouHear' => $faker->numberBetween($min = 1, $max = 4),
        'HowDidYouHearDetails' => $faker->sentence(6, true),
        'ThirdPartyId' => $faker->ean8,
        'Active' => $faker->optional(0.2, 1)->numberBetween($min = 0, $max = 1)
    ];
});

$factory->define(App\Student::class, function($faker) {
    return [
        'First' => $faker->firstName,
        'Last' => $faker->lastName,
        'Birthday' => $faker->dateTimeInInterval('now', '-18 years')->format('Y-m-d'),
        'Sex' => $faker->optional(0.1, 1)->numberBetween(1, 2),
        'MedicalConditions' => $faker->sentence(4, true),
        'Comments' => $faker->sentence(4, true),
        'PaperWaiver' => $faker->optional(0.4, 1)->numberBetween(0, 1),
        'OnlineWaiverAccepted' => $faker->dateTimeInInterval('now', '-1 year')->format('Y-m-d'),
        'Performing' => $faker->optional(0.1, 1)->numberBetween(0, 1),
        'ThirdPartyId' => $faker->ean8,
        'Active' => $faker->optional(0.2, 1)->numberBetween($min = 0, $max = 1)
    ];
});

