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
            'view' => 'pages/listUser/listUser',
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

    public function logoutUser()
    {
        unset($_SESSION[LOGGED]);

        return redirect('/');
    }

    public function createUser()
    {
        if (empty($_POST['name'])) {
            return setMessageAndRedirect('name', 'names is in blank', '/sign-up');
        }
        if (empty($_POST['email'])) {
            return setMessageAndRedirect('email', 'email is in blank', '/sign-up');
        }
        if (empty($_POST['password'])) {
            return setMessageAndRedirect('password', 'password is in blank', '/sign-up');
        }
        if (empty($_POST['repeatPassword'])) {
            return setMessageAndRedirect('repeatPassword', 'repeat password is in blank', '/sign-up');
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];

        if(!$password === $repeatPassword) {
            return setMessageAndRedirect('password', 'passwords do not match', '/sign-up');
        }

        if (isset((\App\DB\UserDAO::getUserByEmail($email))[0])) {
            return setMessageAndRedirect('email', 'email is already being used.', '/sign-up');
        }

        $user = new User(cuid(), $name, $email, password_hash($password, PASSWORD_DEFAULT));
        \App\DB\UserDAO::createUser($user);
        return  redirect('/user/');
    }

    public function edit($params)
    {
        $id = (string) array_values($params)[0];
        $user = \App\DB\UserDAO::getIdUser($id);

        return [
            'view' => 'pages/home/home',
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
