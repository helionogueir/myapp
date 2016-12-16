<?php

namespace source\core\environment\fileReader;

abstract class Allowed {

  public static function files(): Array {
    return Array(
      "htm",
      "html",
      "xhtml",
      "js",
      "css",
      "json",
      "xml",
      "ico",
      "png",
      "jpg",
      "jpeg",
      "gif",
      "bmp",
      "eot",
      "svg",
      "ttf",
      "woff"
    );
  }

  public static function textTypes(): Array {
    return Array(
      "htm",
      "html",
      "xhtml",
      "js",
      "css",
      "json",
      "xml"
    );
  }

}
