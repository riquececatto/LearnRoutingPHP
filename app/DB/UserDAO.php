<?php

namespace App\DB;

use App\Models\User;

class UserDAO extends DAO
{

    protected static function getAllUser() {
        try {
            $conn = DAO::openDB();

            $stmt = $conn->prepare('SELECT * FROM USER;');
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $pdo) {
            var_dump('Error getAllUser', $pdo->getMessage());
        }
    }

    protected static function getIdUser(string $id) {
        try {
            $conn = DAO::openDB();

            $stmt = $conn->prepare('SELECT * FROM USER WHERE idUser =:idUser; ');
            $stmt->bindValue(':idUser', $id, \PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $pdo) {
            var_dump('Error getIdUser', $pdo->getMessage());
        }
    }

    protected static function getUserByEmail(string $email) : array {
        try {
            $conn = DAO::openDB();

            $stmt = $conn->prepare('SELECT * FROM USER WHERE emailUser =:emailUser; ');
            $stmt->bindValue(':emailUser', $email, \PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $pdo) {
            var_dump('Error getEmailUser', $pdo->getMessage());
        }
    }

    protected static function createUser(User $user) : void {
        try {
            $conn = DAO::openDB();

            $stmt = $conn->prepare('INSERT INTO USER VALUE(:idUser, :nameUser, :emailUser, :passwordUser);');

            $stmt->bindValue(':idUser', $user->getIdUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':nameUser', $user->getNameUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':emailUser', $user->getEmailUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':passwordUser', $user->getPasswordUser(), \PDO::PARAM_STR);
            $stmt->execute();
        } catch(\PDOException $pdo) {
            var_dump('Error createUser', $pdo->getMessage());
        }
    }

    protected static function updateUser(User $user) : void {
        try {
            $conn = DAO::openDB();

            $stmt = $conn->prepare('UPDATE USER SET nameUser =:nameUser, emailUser =:emailUser, passwordUser =:passwordUser WHERE idUser =:idUser; ');
            $stmt->bindValue(':nameUser', $user->getNameUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':emailUser', $user->getEmailUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':passwordUser', $user->getPasswordUser(), \PDO::PARAM_STR);
            $stmt->bindValue(':idUser', $user->getIdUser(), \PDO::PARAM_STR);
            $stmt->execute();
        } catch(\PDOException $pdo) {
            var_dump('Error UpdateUser', $pdo->getMessage());
        }
    }

    protected static function deleteUser(string $id) : void {
        try {
            $conn = DAO::openDB();

            $stmt = $conn->prepare('DELETE FROM USER WHERE idUser =:id; ');
            $stmt->bindValue(':id', $id, \PDO::PARAM_STR);
            $stmt->execute();
        } catch(\PDOException $pdo) {
            var_dump('Error DeleteUser', $pdo->getMessage());
        }
    }
    
}