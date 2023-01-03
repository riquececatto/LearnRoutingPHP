<?php

return [
    'POST' => [
        '/user/create/' => 'UserController@create',
    ],
    'GET' => [
        '/' => 'HomeController@index',
        '/user/' => 'UserController@index',
        '\/user\/[0-9]+\/?' => 'UserController@show',
        '\/user\/delete\/[a-z0-9]+\/?' => 'UserController@delete'
    ]
];

    