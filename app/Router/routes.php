<?php

return [
    'GET' => [
        '/' => 'HomeController@index',
        '\/user\/[0-9]+\/?' => 'UserController@show'
    ]
];

    