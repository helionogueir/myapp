<?php

namespace source\core\environment;

use stdClass;
use SplFileObject;
use helionogueir\languagepack\Lang;

class Configuration {

  public function set() {
    global $ENV, $DIR;
    $ENV = new stdClass();
    $object = json_decode(file_get_contents((new SplFileObject($DIR->root . DIRECTORY_SEPARATOR . "environment.json", "r"))->getPathname()));
    if ((JSON_ERROR_NONE == json_last_error())) {
      $ENV = $object;
      Lang::configuration($ENV->language->locale);
      Lang::addRoot("source", $DIR->source);
    }
    return null;
  }

}
