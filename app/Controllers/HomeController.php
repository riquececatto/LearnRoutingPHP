<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return [
            'view' => 'pages/home/home.php',
            'data' => [
                'title' => 'Home',
                'txtAction' => 'Sign-in'
            ]
        ];
    }

    public function signUp()
    {  
        return [
            'view' => 'pages/home/home.php',
            'data' => [
                'title' => 'Home',
                'txtAction' => 'Sign-up'
            ]
        ];
    }
}
