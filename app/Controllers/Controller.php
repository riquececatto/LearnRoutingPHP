<?php

namespace App\Controllers;

class Controller
{
    public static function getController(array $routes, $params) {
        var_dump($routes);
        die();
        [$controller, $method] = explode('@', array_values($routes[0]));

        
    }
}