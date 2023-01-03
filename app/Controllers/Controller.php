<?php

namespace App\Controllers;

class Controller
{
    public static function getController(array $matchedUri, $params) {
        [$controller, $method] = explode('@', array_values($matchedUri)[0]);

        $controllerWithNamespace = CONTROLLER_PATH . $controller;

        if(!class_exists($controllerWithNamespace)) {
            throw new \Exception("Don't exists the {$controller} class");
        }

        $controllerInstance = new $controllerWithNamespace();

        if(!method_exists($controllerInstance, $method)) {
            throw new \Exception("Don't exists the {$method} method in the {$controller} class");
        }

        return $controllerInstance->$method($params);
    }
}