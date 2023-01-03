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

    public function __construct(string $id, string $name, string $email, string $password)
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

    public function getIdUser() {
        return $this->user['idUser'];
    }

    public function getNameUser() {
        return $this->user['nameUser'];
    }

    public function getEmailUser() {
        return $this->user['emailUser'];
    }

    public function getPasswordUser() {
        return $this->user['passwordUser'];
    }

    public function setIdUser(string $id) : void{
        $this->user['idUser']= $id ;
    }

    public function setNameUser(string $name) : void{
        $this->user['nameUser']= $name ;
    }

    public function setEmailUser(string $email) : void{
        $this->user['emailUser']= $email ;
    }

    public function setPasswordUser(string $password) : void {
        $this->user['passwordUser']= $password ;
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

