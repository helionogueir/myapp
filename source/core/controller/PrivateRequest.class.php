<?php

namespace source\core\controller;

use helionogueir\routing\Route;
use source\core\controller\PublicRequest;

class PrivateRequest extends PublicRequest {

  public function __construct(Route $route) {
    global $ENV;
    parent::__construct($route);
    if (empty($_SESSION["user"]["id"])) {
      session_destroy();
      header("location:{$ENV->url->https}");
    }
  }

}
