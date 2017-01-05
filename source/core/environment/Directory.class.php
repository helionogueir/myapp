<?php

namespace source\core\environment;

use stdClass;
use helionogueir\foldercreator\folder\Create;

class Directory {

  public function set(string $pathRoot) {
    global $DIR;
    $DIR = new stdClass();
    $DIR->root = realpath($pathRoot);
    $this->definePathApplication();
    $this->definePathCache();
    return null;
  }

  private function definePathApplication() {
    global $DIR;
    $DIR->source = $DIR->root . DIRECTORY_SEPARATOR . "source";
    $DIR->plugin = $DIR->root . DIRECTORY_SEPARATOR . "plugin";
    return null;
  }

  private function definePathCache() {
    global $DIR;
    $dir = new Create();
    $DIR->cache = $DIR->root . DIRECTORY_SEPARATOR . "cache";
    $DIR->session = $DIR->cache . DIRECTORY_SEPARATOR . "session";
    $dir->mkdir($DIR->cache, 0777);
    $dir->mkdir($DIR->session, 0777);
    return null;
  }

}
