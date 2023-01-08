<?php

function validateUser(string $action){  

    if($action == 'create'){
        if (empty($_POST['name'])) {
            return 'name';
            // return setMessageAndRedirect('name', 'name is in blank', '/sign-up');
        }
        if (empty($_POST['email'])) {
            return 'email';
            // return setMessageAndRedirect('email', 'email is in blank', '/sign-up');
        }
        if (empty($_POST['password'])) {
            return 'password';
            // return setMessageAndRedirect('password', 'password is in blank', '/sign-up');
        }
        if (empty($_POST['repeatPassword'])) {
            return 'repeatPassword';
            // return setMessageAndRedirect('repeatPassword', 'repeat password is in blank', '/sign-up');
        }
    }
    if($action == 'update'){
        if (empty($_POST['name'])) {
            return setMessageAndRedirect('name', 'names is in blank', '/user/'.user()['idUser']);
        }
        if (empty($_POST['oldPassword'])) {
            return setMessageAndRedirect('oldPassword', 'oldPassword is in blank', '/user/'.user()['idUser']);
        }
        if (empty($_POST['password'])) {
            return setMessageAndRedirect('password', 'password is in blank', '/user/'.user()['idUser']);
        }
        if (empty($_POST['repeatPassword'])) {
            return setMessageAndRedirect('repeatPassword', 'repeat password is in blank', '/user/'.user()['idUser']);
        }
    }
}

function validateUpdateUser(){

}
