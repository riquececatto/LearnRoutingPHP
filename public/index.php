<?php

use App\Router\Router;

try {
    require_once '../vendor/autoload.php';

    $routeData = Router::getRouter();

    extract($routeData['data']);

    $view = $routeData['view'];

    require_once VIEW . 'master.php';

} catch(\Exception $e) {
    var_dump($e->getMessage());
}
