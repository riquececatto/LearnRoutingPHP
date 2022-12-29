<?php

namespace App\Controllers;

class Controller
{
    public static function getController(array $matchedUri, $params) {
        [$controller, $method] = explode('@', array_values($matchedUri)[0]);

        $controllerWithNamespace = CONTROLLER_PATH . $controller;

        $controllerInstance = new $controllerWithNamespace();

        return $controllerInstance->$method();
    }
}