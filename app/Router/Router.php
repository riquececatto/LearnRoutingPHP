<?php

namespace App\Router;

use App\Controllers\Controller;

class Router
{
    public static function getRouter()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $routes = require_once 'routes.php';

        $matchedUri = self::exactMatchUri($uri, $routes[$requestMethod]);

        $params = [];
        if (empty($matchedUri)) {
            $matchedUri = self::regularExpressionMatchUri($uri, $routes[$requestMethod]);
            var_dump($matchedUri);
            die();
        }

        if (!empty($matchedUri)) {
            // return Controller::getController($matchedUri, $params);
        }
    }

    // Exact URI
    private static function exactMatchUri(string $uri, array $routes)
    {
        (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
    }

    //Regular Expression URI
    private static function regularExpressionMatchUri(string $uri, array $routes)
    {
        //rgx = / ^\/user\/[0-9]+\/?$ /
        return array_filter(
            $routes,
            function ($value) use ($uri) {
                //uri   =  /user/100/
                
                //regex -> / ^\/user\/[0-9]+\/?$ /
                // $regex = str_replace('/', '\/', $value);

                return preg_match("/^{$value}$/", $uri);
            },
            ARRAY_FILTER_USE_KEY
        );
    }
}
