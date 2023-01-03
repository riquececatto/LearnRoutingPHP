<?php

namespace App\Controllers;

use App\DB\DAO;
use App\Models\User;

class UserController extends DAO
{
    private array $user;

    public function index() {
        $users = \App\DB\UserDAO::getAllUser();

        return [
            'view' => 'pages/listUser/listUser.php',
            'data' => ['title' => 'Users', 'users' => $users]
        ];
    }

    public function show()
    {

        return [
            'view' => '',
            'data' => []
        ];
    }
}
