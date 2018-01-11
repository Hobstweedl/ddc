<?php

namespace Tests\Feature;

use App\User;
use App\PrettyTest;
use Tests\TestCase;
use League\CLImate\CLImate;
use Illuminate\Console\Command;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ClassesRoutesTest extends TestCase {

  public function testClasses() {

    $console = new \App\PrettyTest;
    $console->testTitle('Running classes tests');

    $route = '/classes';
    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->get($route);
    if ($response->assertSuccessful()) {
      $console->success("Route: {$route} route success");
    } else {
      $console->failure('Route: {$route} route failed');
    }
  }
  public function testClassesCreate() {
    $console = new \App\PrettyTest;
    $route = '/classes/create';

    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->get($route);
    if ($response->assertSuccessful()) {
      $console->success("Route: {$route} route success");
    } else {
      $console->failure('Route: {$route} route failed');
    }
  }

  public function testClassesEdit() {
    $console = new \App\PrettyTest;
    $route = '/classes/1';

    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->get($route);
    if ($response->assertSuccessful()) {
      $console->success("Route: {$route} route success");
    } else {
      $console->failure('Route: {$route} route failed');
    }
  }

  public function testClassesSeasons() {
    $console = new \App\PrettyTest;
    $route = '/classes/season/1';

    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->get($route);
    if ($response->assertSuccessful()) {
      $console->success("Route: {$route} route success");
    } else {
      $console->failure('Route: {$route} route failed');
    }
  }
}
