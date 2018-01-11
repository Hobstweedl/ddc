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
      $students = $family->students()->saveMany(factory(App\Student::class, $howManyStudents)->make(['Last'=>$family->Last,]));
      foreach ($students as $student) {
        $howManyEnrollments = rand(1,4);
        $student->enrollments()->saveMany(factory(App\Enrollment::class, $howManyEnrollments)->make(['student_id'=>$student->id]));
      }
    }
  }
}
