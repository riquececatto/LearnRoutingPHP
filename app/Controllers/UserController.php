<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends \App\DB\UserDAO
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

    public function create()
    {
        $validate = validateUser('create');

        if($validate) {
            return setMessageAndRedirect($validate, $validate . ' is in blank', '/sign-up');
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];

        if($password !== $repeatPassword) {
            return setMessageAndRedirect('password', 'passwords isnt match', '/sign-up');
        }

        if (isset((\App\DB\UserDAO::getUserByEmail($email))[0])) {
            return setMessageAndRedirect('email', 'email is already being used.', '/sign-up');
        }

        $user = new User(cuid(), $name, $email, password_hash($password, PASSWORD_DEFAULT));
        \App\DB\UserDAO::createUser($user);
        $_SESSION[LOGGED] = \App\DB\UserDAO::getUserByEmail($email)[0];
        return  redirect('/user/');
    }

    public function edit($params)
    {
        $id = (string) array_values($params)[0];
        $user = \App\DB\UserDAO::getIdUser($id)[0];

        return [
            'view' => 'pages/home/home',
            'data' => [
                'title' => 'Edit User',
                'form' => 'partials/form/edit',
                'user' => $user
            ]
        ];
    }

    public function update()
    {
        $validate = validateUser('update');

        if($validate) {
            return setMessageAndRedirect($validate, $validate . ' is in blank', '/sign-up');
        }

        $name = $_POST['name'];
        $email = user()['emailUser'];
        $oldPassword = $_POST['oldPassword'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];
        
        if($password !== $repeatPassword) {
            return setMessageAndRedirect('password', 'password isnt match', '/user/'.user()['idUser']);
        }

        if (! password_verify($oldPassword, user()['passwordUser'])) {
            return setMessageAndRedirect('oldPassword', 'oldPassword error', '/user/'.user()['idUser']);
        }

        $user = new User(user()['idUser'], $name, $email, password_hash($password, PASSWORD_DEFAULT));
        $user = \App\DB\UserDAO::updateUser($user);
        return  redirect('/user/');
    }

    public function delete($params)
    {
        $id = (string) array_values($params)[0];
        $user = \App\DB\UserDAO::getIdUser($id)[0];
        \App\DB\UserDAO::deleteUser($id);
        if(user()['emailUser'] == $user['emailUser']) {
            unset($_SESSION[LOGGED]);
            return  redirect('/');
        }
        return redirect('/user/');
    }
}
