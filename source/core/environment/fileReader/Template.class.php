<?php

namespace source\core\environment\fileReader;

use helionogueir\routing\Route;
use source\core\environment\FileReader;
use source\core\environment\fileReader\Allowed;

class Template extends FileReader {

  public function load(Route $route) {
    global $DIR;
    $this->setAllow(Allowed::files());
    $this->setTypeText(Allowed::textTypes());
    $pathname = $DIR->source . DIRECTORY_SEPARATOR . $route->getRequest();
    $this->read($pathname);
    return null;
  }

}
