<?php

use App\Router\Router;

try {
    require_once '../vendor/autoload.php';

    // string(11) "user\/100\/" string(15) "/^user\/100\/?/" bool(false) string(4) "
    // var_dump('/^user\/[0-9]+\/?$/', '<br>' , '/user/100/', '<br>');

    // var_dump(preg_match('/^\/user\/[0-9]+\/?$/', '/user/100/')); // TRUE
    // die();

    $routeData = Router::getRouter();

    require_once VIEW . 'master.php';

} catch(\Exception $e) {
    var_dump($e->getMessage());
}
