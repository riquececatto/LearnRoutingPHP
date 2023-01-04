<?php

namespace App\Controllers;

use App\DB\DAO;
use App\Models\User;

class UserController extends DAO
{

    public function index($params)
    {
        $users = \App\DB\UserDAO::getAllUser();

        return [
            'view' => 'pages/listUser/listUser.php',
            'data' => [
                'title' => 'Users',
                'users' => $users
            ]
        ];
    }

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            return redirect('/');
        }

        $user = \App\DB\UserDAO::getUserByEmail($email)[0];
        if (!password_verify($password, $user['passwordUser'])) {
            return redirect('/');
        }

        $_SESSION[LOGGED] = $user;
        return redirect('/user/');
    }

    public function logoutUser() {
        unset($_SESSION[LOGGED]);

        return redirect('/');
    }

    public function createUser()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat-password'];

        if (!empty($name) || !empty($email || !empty($password) || !empty($repeatPassword))) {
            $user = \App\DB\UserDAO::getUserByEmail($email)[0];

            if (empty($user)) {
                if ($password == $repeatPassword) {
                    $user = new User(cuid(), $name, $email, password_hash($password, PASSWORD_DEFAULT));
                    \App\DB\UserDAO::createUser($user);
                    return  redirect('/user/');
                }
                return setMessageAndRedirect('password', 'Senhas não batem', '/sign-up');
            }
            return setMessageAndRedirect('email', 'Email já cadastrado.', '/sign-up');
        }
        return setMessageAndRedirect('name', 'Campos Inválidos', '/sign-up');
    }

    public function edit($params)
    {
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

    public function deleteUser($params)
    {
        $id = (string) array_values($params)[0];

        \App\DB\UserDAO::deleteUser($id);
        return  redirect('/user/');
    }
}
