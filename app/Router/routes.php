<?php

return [
    'GET' => [
        '/' => 'HomeController@index',
        '/user/' => 'UserController@index',
        '\/user\/[0-9]+\/?' => 'UserController@show'
    ]
];

    