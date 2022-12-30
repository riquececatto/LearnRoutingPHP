<?php

use App\Controllers\UserController;
use App\Models\User;
use App\Router\Router;

try {
    require_once '../vendor/autoload.php';

    $routeData = Router::getRouter();

    extract($routeData['data']);

    $view = $routeData['view'];



    $test = new UserController(new User('1', 'Henrique', '@gmail', '123'));



    echo '<pre>';
    var_dump($test->getByIdUser());
    die();

    require_once VIEW . 'master.php';

} catch(\Exception $e) {
    var_dump($e->getMessage());
}


// '1', 'Henrique', '@gmail', '123'
// ['2', 'Rique', '@gmail', '123',]
