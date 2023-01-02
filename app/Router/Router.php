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
            
            $uri = explode('/', ltrim($uri, '/'));
            $params = self::getParams($uri, $matchedUri);
        }

        if (!empty($matchedUri)) {
            return Controller::getController($matchedUri, $params);
        }

        throw new \Exception('Algo deu errado na rota.');
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
                return preg_match("~^{$value}$~", $uri);
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    private static function getParams(array $uri, array $matchedUri)
    {
        $matchedParams = array_keys($matchedUri)[0];
        return array_diff($uri, explode('\/', $matchedParams));
    }
}
