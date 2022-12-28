<?php

try {
    require_once '../vendor/autoload.php';

    require_once VIEW . 'master.php';

} catch(\Exception $e) {
    var_dump($e->getMessage());
}
