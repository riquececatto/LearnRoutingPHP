<?php

namespace App\Controllers;

use App\DB\DAO;
use App\Models\User;

class UserController extends DAO
{

    public function index() {
        $users = \App\DB\UserDAO::getAllUser();

        return [
            'view' => 'pages/listUser/listUser.php',
            'data' => [
                'title' => 'Users',
                'users' => $users
            ]
        ];
    }

    public function createUser() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat-password'];

        if(!empty($password)) {
            if($password == $repeatPassword) {
                $user = new User(cuid(), $name, $email, password_hash($password, PASSWORD_DEFAULT));
                \App\DB\UserDAO::createUser($user);
                return  redirect('/user/');
            }
            return  redirect('/');
        }
        return  redirect('/');
    }

    public function edit($params) {
        $id = (string) array_values($params)[0];
        $user = \App\DB\UserDAO::getIdUser($id);

        return [
            'view' => 'pages/home/home.php',
            'data' => [
                'title' => 'Users',
                'txtAction' => 'Create', 
                'user' => $user[0]
            ]
        ];
    }

    public function deleteUser($params) {
        $id = (string) array_values($params)[0];

        \App\DB\UserDAO::deleteUser($id);
        return  redirect('/user/');
    }
}
