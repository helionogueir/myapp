<?php

namespace source\core\controller;

use Smarty;
use source\core\Controller;
use helionogueir\routing\Route;
use helionogueir\foldercreator\tool\Path;
use helionogueir\typeBoxing\parse\ObjectToArray;

class PublicRequest extends Controller {

  private $smarty = null;

  public function __construct(Route $route) {
    global $ENV, $DIR;
    parent::__construct($route);
    $this->smarty = new Smarty();
    $this->smarty->setCompileDir($DIR->cache . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR . 'template');
    $this->smarty->setCacheDir($DIR->cache . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR . 'cache');
    $this->smarty->addPluginsDir(Path::replaceOSSeparator("{$DIR->plugin}/composer/helionogueir/languagepack/core/modifier"));
    $this->smarty->force_compile = false;
    $this->smarty->setTemplateDir(Array(
      "source" => $DIR->source
    ));
    if (!empty($ENV->cache->lifetime)) {
      $this->smarty->caching = (bool) $ENV->cache->lifetime;
      $this->smarty->cache_lifetime = (int) $ENV->cache->lifetime;
    }
    $this->smarty->assign("ENV", (new ObjectToArray())->parse($ENV));
  }

  public function output(string $view) {
    global $ENV;
    $this->smarty->assign("VIEW", Array(
      "template" => $view
    ));
    $this->smarty->display("{$ENV->template->package}/layout.tpl");
    return null;
  }

  public function getSmarty(): Smarty {
    return $this->smarty;
  }

}
