<?php

namespace App;

use League\CLImate\CLImate;
use Illuminate\Database\Eloquent\Model;

class PrettyTest {

  public function __construct() {
    $this->console = new Climate;
  }

  public function testTitle($msg) {
    $this->console->blue($msg);
  }

  public function success($msg) {
    $this->console->green($msg);
  }

  public function failure($msg) {
    $this->console->red($msg);
  }
}
