<?php

namespace App\Controllers;

use App\DB\DAO;
use App\Models\User;

class UserController extends DAO
{
    private array $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show()
    {
        return [
            'view' => '',
            'data' => []
        ];
    }

    public function getByIdUser(string $id = '*')
    {
        // $db = new DAO;
        // $db->openDB();
        // $db->closeDB();

        return $this->user;
    }

    public function getByEmailUser(string $email)
    {
        return [];
    }
}
