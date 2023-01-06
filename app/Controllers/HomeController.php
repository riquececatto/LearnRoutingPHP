<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return [
            'view' => 'pages/home/home',
            'data' => [
                'title' => 'Home',
                'form' => 'partials/form/sign-in'
            ]
        ];
    }

    public function signUp()
    {  
        return [
            'view' => 'pages/home/home',
            'data' => [
                'title' => 'Home',
                'form' => 'partials/form/sign-up'
            ]
        ];
    }
}
