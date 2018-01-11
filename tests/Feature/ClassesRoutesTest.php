<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use League\CLImate\CLImate;
use Illuminate\Console\Command;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ClassesRoutesTest extends TestCase {

  /**
   * A basic test example.
   *
   * @return void
   */
  public function testClasses() {

    $climate = new Climate;
    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->get('/classes');
    if ($response->assertSuccessful()) {
      $climate->green('Route: /classes route success');
    } else {
      $climate->red('Route: /classes/create route failed');
    }
  }
  public function testClassesCreate() {
    $climate = new Climate;
    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->get('/classes/create');
    if ($response->assertSuccessful()) {
      $climate->green('Route: /classes/create route success');
    } else {
      $climate->red('Route: /classes/create route failed');
    }
  }

  public function testClassesParameter() {
    $climate = new Climate;
    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->get('/classes/1');
    if ($response->assertSuccessful()) {
      $climate->green('Route: /classes/1 route success');
    } else {
      $climate->red('Route: /classes/1 route failed');
    }
  }

  public function testClassesSeasons() {
    $climate = new Climate;
    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->get('/classes/season/1');
    if ($response->assertSuccessful()) {
      $climate->green('Route: /classes/season/1 route success');
    } else {
      $climate->red('Route: /classes/season/1 route failed');
    }
  }
}
