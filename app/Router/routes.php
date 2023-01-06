<?php

return [
    'POST' => [
        '/user/login/' => 'UserController@loginUser',
        '/user/create/' => 'UserController@create'
    ],
    'GET' => [
        '/' => 'HomeController@index',
        '/sign-up' => 'HomeController@signUp',
        '/user/' => 'UserController@index',
        '\/user\/[a-z0-9]+\/?' => 'UserController@edit',
        '\/user\/delete\/[a-z0-9]+\/?' => 'UserController@delete',
        '\/user\/[0-9]+\/?' => 'UserController@show',
        '/logout' => 'UserController@logoutUser'
    ]
];

    