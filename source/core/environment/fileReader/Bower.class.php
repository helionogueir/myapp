<?php

namespace source\core\environment\fileReader;

use helionogueir\routing\Route;
use source\core\environment\FileReader;
use source\core\environment\fileReader\Allowed;

class Bower extends FileReader {

  public function load(Route $route) {
    global $DIR;
    $this->setAllow(Allowed::files());
    $this->setTypeText(Allowed::textTypes());
    $pathname = $DIR->plugin . DIRECTORY_SEPARATOR . $route->getRequest();
    $this->read($pathname);
    return null;
  }

}
