<?php

use App\Controllers\UserController;
use App\Models\User;
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


// '1', 'Henrique', '@gmail', '123'
// ['2', 'Rique', '@gmail', '123',]
