<?php

namespace App\DB;

use App\DB\DAO;
use App\Models\User;

class UserDAO extends DAO
{
    public static function getAllUser() {
        try {
            $db = new DAO();
            $stmt = $db->openDB();

            $stmt = $stmt->prepare('SELECT * FROM USER;');
            $stmt->execute();
            $db->closeDB();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $pdo) {
            var_dump('Erro no getAllUser', $pdo->getMessage());
        }
        
    }

    public static function getIdUser(string $id) {
        try {
            $db = new DAO();
            $stmt = $db->openDB();

            $stmt = $stmt->prepare('SELECT * FROM USER WHERE idUser =:id; ');
            $stmt->bindValue(':id', $id, \PDO::PARAM_STR);
            $stmt->execute();
            $db->closeDB();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $pdo) {
            var_dump('Erro no getIdUser', $pdo->getMessage());
        }
    }

    public static function updateUser(User $user) {
        try {
            $db = new DAO();
            $stmt = $db->openDB();

            $stmt = $stmt->prepare('SELECT * FROM USER WHERE idUser =:id; ');
            // $stmt->bindValue(':id', $id, \PDO::PARAM_STR);
            $stmt->execute();
            $db->closeDB();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $pdo) {
            var_dump('Erro no UpdateUser', $pdo->getMessage());
        }
    }
    
}