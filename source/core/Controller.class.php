<?php

namespace source\core;

use helionogueir\routing\Route;

abstract class Controller {

  private $route = null;

  public function __construct(Route $route) {
    $this->route = $route;
  }

}
