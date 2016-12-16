<?php

namespace source\core\environment;

use helionogueir\filecreator\output\ReadFile;

abstract class FileReader {

  private $allow = Array();
  private $typeText = Array();

  protected function read(string $pathname) {
    if (file_exists($pathname) && preg_match("/^(.*)\/(.*)\.(" . implode("|", $this->allow) . ")$/i", $pathname)) {
      (new ReadFile())->read($pathname, preg_match("/^(.*)\/(.*)\.(" . implode("|", $this->typeText) . ")$/i", $pathname), false);
    }
    return null;
  }

  protected function setAllow(Array $allow) {
    $this->allow = $allow;
    return null;
  }

  protected function setTypeText(Array $typeText) {
    $this->typeText = $typeText;
    return null;
  }

}
