<?php

namespace source\core;

use source\core\environment\Directory;
use source\core\environment\Configuration;
use source\core\environment\CrossVersion;
use helionogueir\routing\server\Autoload;
use helionogueir\changedirective\cgi\Debug;
use helionogueir\changedirective\cgi\Session;
use helionogueir\changedirective\cgi\Locale;
use helionogueir\changedirective\cgi\Timezone;
use helionogueir\routing\Route;
use helionogueir\routing\route\Factory;

class Environment {

    public static function main($pathRoot) {
        global $ENV, $DIR;
        // Autoload
        require_once $pathRoot . DIRECTORY_SEPARATOR . "plugin" . DIRECTORY_SEPARATOR . "composer" . DIRECTORY_SEPARATOR . "autoload.php";
        (new Autoload())->registerRoot($pathRoot);
        // Settings
        (new Directory())->set($pathRoot);
        (new Configuration())->set();
        (new Debug())->set($ENV->debug->mode);
        (new Session())->setMaxLifetime($ENV->cache->lifetime)->setPath($DIR->session)->start();
        (new Timezone())->set($ENV->timezone->{$ENV->language->locale});
        (new Locale())->set($ENV->language->locale, $ENV->language->collate);
        (new CrossVersion())->prepare();
        Environment::request();
        return null;
    }

    private static function request() {
        global $DIR;
        $request = filter_input(INPUT_GET, 'request', FILTER_SANITIZE_STRING);
        $directory = preg_replace("/^([^\/]*).*?$/", "$1", $request);
        $route = null;
        switch ($directory) {
            case "bower" :
            case "template" :
                $route = new Route($request, "source\\core\\environment\\fileReader\\" . ucfirst($directory), "load");
                $className = $route->getClassName();
                (new $className())->{$route->getMethod()}($route);
                break;
            default :
                $route = Factory::byFile($request, $DIR->source . DIRECTORY_SEPARATOR . "module" . DIRECTORY_SEPARATOR . $directory);
                $className = $route->getClassName();
                (new $className($route))->{$route->getMethod()}();
                break;
        }
        return null;
    }

}
