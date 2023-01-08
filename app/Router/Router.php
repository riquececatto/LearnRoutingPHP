<?php

namespace App\Router;

use App\Core\Controller;

class Router
{
    /**
     * Function where it takes the data if it receives a valid route
     */
    public static function getRouter()
    {
        /**
         *  $uri -> Catch URI
         *  $requestMethod -> Catch the Method (e.g: GET / POST / PUT / DELETE / ...) 
         *  $routes -> Catch predefined routes in routes.php file
         *  $params -> Where it stores the parameters received by the GET method
         */
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $routes = require_once 'routes.php';

        $params = [];

        $matchedUri = self::regularExpressionMatchUri($uri, $routes[$requestMethod]);
        
        /**
         * If it does not find the URI it will throw a new exception
         */
        if (empty($matchedUri)) {
            throw new \Exception('Route not found.');
        }

        $uri = explode('/', ltrim($uri, '/'));
        $params = self::getParams($uri, $matchedUri);

        return Controller::getController($matchedUri, $params);
    }

    /**
     * Function where it will test the URI with each predefined route in routes.php file
     */
    private static function regularExpressionMatchUri(string $uri, array $routes)
    {
        return array_filter(
            $routes,
            function ($value) use ($uri) {
                return preg_match("~^{$value}$~", $uri);
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    /**
     * Function where it will get the difference between the URI and the predefined route in routes.php file
     */
    private static function getParams(array $uri, array $matchedUri)
    {
        $matchedParams = array_keys($matchedUri)[0];
        return array_diff($uri, explode('\/', $matchedParams));
    }
}
