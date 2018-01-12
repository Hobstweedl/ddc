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

$factory->define(App\Instructor::class, function ($faker) {
    $first = $faker->firstName;
    $display = $faker->title . ' ' . $first;
    return [
        'First' => $first,
        'Last' => $faker->lastName,
        'Display' => $display,
        'Email' => $faker->safeEmail,
        'Active' => $faker->optional(0.2, 1)->numberBetween($min = 0, $max = 1)
    ];
});

$factory->define(App\Classes::class, function ($faker) {
    $dayHeldOn = $faker->dayOfWeek();
    $typeOfClass = App\ClassType::inRandomOrder()->first();
    $typeOfClassID = $typeOfClass->id;
    $minute = $faker->optional(0.5, '00')->randomElement($array = array('15', '30', '45'));
    $hour = $faker->numberBetween($min = 1, $max = 12);
    $amORpm = $faker->amPm();
    if ($hour > 9 && $hour < 12) {$amORpm = 'am';}
    if ($hour < 8 || $hour == 12) {$amORpm = 'pm';}
    $timeOfClass = $hour . ':' . $minute . $amORpm;
    $databaseTime = \Carbon\Carbon::parse($timeOfClass);
    /* $name = $dayHeldOn . ' ' . $timeOfClass . ' ' . $typeOfClass->Name; */
    $name = $faker->colorName . ' ' . $faker->lastName . 's ' . $typeOfClass->Name;
    $ageFrom = $faker->numberBetween($min = 3, $max = 99);
    $ageTo = $ageFrom + 3;
    return [
        'Name' => $name,
        'season_id' => App\Season::inRandomOrder()->first(),
        'DayHeldOn' => $dayHeldOn,
        'StartTime' => $databaseTime,
        'Length' => $faker->optional(0.2, '60')->randomElement($array = array('30' ,'45', '60', '90', '120')),
        'instructor_id' => App\Instructor::inRandomOrder()->first(),
        'classtype_id' => $typeOfClassID,
        'PublicDescription' => $faker->sentence(4, true),
        'PrivateNotes' => $faker->sentence(4, true),
        'MaxSize' => $faker->optional(0.2, 10)->numberBetween($min = 3, $max = 25),
        'location_id' => App\Location::inRandomOrder()->first(),
        'AgeFrom' => $ageFrom,
        'AgeTo' => $ageTo,
        'AgeNAFlag' => $faker->optional(0.1, 1)->numberBetween($min = 0, $max = 1),
        'Prerequisite' => $faker->optional(0.1, 0)->numberBetween($min = 0, $max = 1),
        'OnlineRegistrationAllowed' => $faker->optional(0.1, 1)->numberBetween($min = 0, $max = 1),
        'AllowIndividualDayRegistration' => $faker->numberBetween($min = 0, $max = 1),
        'Password' => $faker->optional(0.1, '')->password,
        'ClassCharge' => $faker->optional(0.1, 0)->numberBetween($min = 10, $max = 50)
    ];
});

$factory->define(App\ClassDate::class, function ($faker) {
    $minute = $faker->optional(0.5, '00')->randomElement($array = array('15', '30', '45'));
    $hour = $faker->numberBetween($min = 1, $max = 12);
    $amORpm = $faker->amPm();
    if ($hour > 9 && $hour < 12) {$amORpm = 'am';}
    if ($hour < 8 || $hour == 12) {$amORpm = 'pm';}
    $timeOfClass = $hour . ':' . $minute . $amORpm;
    $databaseTime = \Carbon\Carbon::parse($timeOfClass);
    return [
        'StartTime' => $databaseTime,
        'Length' => $faker->optional(0.2, '60')->randomElement($array = array('30' ,'45', '60', '90', '120'))
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

$factory->define(App\Enrollment::class, function($faker) {
  $class = App\Classes::inRandomOrder()->first();
  $season = $class->season()->first();
  $classdate = new App\ClassDate;
  if ($season->SeasonType == 2) {
    $classdate = App\ClassDate::where('classes_id', $class->id)->inRandomOrder()->first();
  }

  $dropped = $faker->optional(0.2, 0)->numberBetween(0, 1);
  $droppedOn = null;
  $enrolledOn = null;
  if ($dropped == 0) {
    $enrolledOn = $faker->dateTimeInInterval('now', '-1 year')->format('Y-m-d');
  } else {
    $droppedOn = $faker->dateTimeInInterval('now', '-1 year')->format('Y-m-d');
    $enrolledOn = $faker->dateTimeInInterval($droppedOn, '-1 year')->format('Y-m-d');
  }
  return [
    'classes_id' => $class->id,
    'class_dates_id' => $classdate->id,
    'Dropped' => $dropped,
    'EnrolledOn' => $enrolledOn,
    'DroppedOn' => $droppedOn,
    'Active' => $faker->optional(0.2, 1)->numberBetween($min = 0, $max = 1)
  ];
});

