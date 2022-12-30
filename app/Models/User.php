<?php

namespace App\Models;

class User
{
    private array $user = [
        'idUser' => '', 
        'nameUser' => '', 
        'emailUser' => '', 
        'passwordUser' => ''
    ];  

    public function __construct($id, $name, $email, $password)
    {
        $this->user['idUser'] = $id;
        $this->user['nameUser'] = $name;
        $this->user['emailUser'] = $email;
        $this->user['passwordUser'] = $password;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function __destruct()
    {
        unset(
            $this->user['idUser'],
            $this->user['nameUser'],
            $this->user['emailUser'],
            $this->user['passwordUser'],
        );
    }
}

