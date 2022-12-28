<?php

namespace App\Router;

class Router 
{
    public static function getRouter() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $routes = require_once 'routes.php';

        $matchedUri = self::exactMatchUri($uri, $routes[$requestMethod]);

        $params = [];
        if(empty($matchedUri)) {
            $matchedUri = self::regularExpressionMatchUri($uri, $routes[$requestMethod]);
        }

        if(!empty($matchedUri)) {
            return [];
        }
        

    }

    // Exact URI
    private static function exactMatchUri(string $uri, array $routes) {
        (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [] ;
    }

    //Regular Expression URI
    private static function regularExpressionMatchUri(string $uri, array $routes) {
        
    //     //uri = /user/100/ => \/user\/100\/
    //     $uri = str_replace('/', '\/', $uri);
    //     die();
        
    //     //rgx = / ^\/user\/[0-9]+\/?$ /
    //     return array_filter($routes, function($value) use ($uri) {
    //         $uri = 
    //         $regex = "";
    //         var_dump($regex);
    //         die();

    //         // var_dump($uri, $regex, preg_match($regex, $uri), '<hr>');

    //         // return preg_match(pattern, $uri);
    //     });
    }

}