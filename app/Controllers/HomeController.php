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
                'form' => 'partials/form/sign-in.php'
            ]
        ];
    }

    public function signUp()
    {  
        return [
            'view' => 'pages/home/home.php',
            'data' => [
                'title' => 'Home',
                'form' => 'partials/form/sign-up.php'
            ]
        ];
    }
}
