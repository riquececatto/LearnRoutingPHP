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

    public static function getUserByEmail(string $email) : array {
        try {
            $db = new DAO();
            $stmt = $db->openDB();

            $stmt = $stmt->prepare('SELECT * FROM USER WHERE emailUser =:emailUser; ');
            $stmt->bindValue(':emailUser', $email, \PDO::PARAM_STR);
            $stmt->execute();
            $db->closeDB();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $pdo) {
            var_dump('Erro no getEmailUser', $pdo->getMessage());
        }
    }

    public static function createUser(User $user) : void {
        try {
            $db = new DAO();
            $stmt = $db->openDB();

            $stmt = $stmt->prepare('INSERT INTO USER VALUE(:idUser, :nameUser, :emailUser, :passwordUser);');

            $stmt->bindValue(':idUser', $user->getIdUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':nameUser', $user->getNameUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':emailUser', $user->getEmailUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':passwordUser', $user->getPasswordUser(), \PDO::PARAM_STR);
            $stmt->execute();
            $db->closeDB();
        } catch(\PDOException $pdo) {
            var_dump('Erro no createUser', $pdo->getMessage());
        }
    }

    public static function updateUser(User $user) : void {
        try {
            $db = new DAO();
            $stmt = $db->openDB();

            $stmt = $stmt->prepare('UPDATE USER SET nameUser =:nameUser, emailUser =:emailUser, passwordUser =:passwordUser WHERE idUser =:idUser; ');
            $stmt->bindValue(':nameUser', $user->getNameUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':emailUser', $user->getEmailUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':passwordUser', $user->getPasswordUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':idUser', $user->getIdUser(), \PDO::PARAM_STR);
            $stmt->execute();
            $db->closeDB();
        } catch(\PDOException $pdo) {
            var_dump('Erro no UpdateUser', $pdo->getMessage());
        }
    }

    public static function deleteUser(string $id) : void {
        try {
            $db = new DAO();
            $stmt = $db->openDB();

            $stmt = $stmt->prepare('DELETE FROM USER WHERE idUser =:id; ');
            $stmt->bindValue(':id', $id, \PDO::PARAM_STR);
            $stmt->execute();
            $db->closeDB();
        } catch(\PDOException $pdo) {
            var_dump('Erro no DeleteUser', $pdo->getMessage());
        }
    }
    
}