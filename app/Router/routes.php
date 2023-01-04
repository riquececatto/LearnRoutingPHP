<?php

return [
    'POST' => [
        '/user/create/' => 'UserController@createUser',
    ],
    'GET' => [
        '/' => 'HomeController@index',
        '/sign-up' => 'HomeController@signUp',
        '/user/' => 'UserController@index',
        '\/user\/[a-z0-9]+\/?' => 'UserController@edit',
        '\/user\/delete\/[a-z0-9]+\/?' => 'UserController@deleteUser',
        '\/user\/[0-9]+\/?' => 'UserController@show'
    ]
];

    