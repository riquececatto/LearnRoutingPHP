<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return [
            'view' => 'pages/home/home.php',
            'data' => ['title' => 'Home']
        ];
    }
}
