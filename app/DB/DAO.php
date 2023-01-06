<?php

namespace App\DB;

abstract class DAO
{
    private static ?array $dbo;
    
    private static function stringConnection() : void
    {
        self::$dbo = [
            'dbName' => 'example',
            'dbHost' => 'localhost:3306',
            'dbUser' => 'riquececatto',
            'dbPassword' => '159753'
        ];
    }
    
    protected static function openDB() : \PDO {
        try {
            if(!isset(self::$dbo)) {
                self::stringConnection();
            }

            $conn = new \PDO("mysql:dbname=".self::$dbo['dbName'].";host=".self::$dbo['dbHost'], self::$dbo['dbUser'], self::$dbo['dbPassword'], 
                [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ]
            );

            self::closeDB();
            return $conn;


        } catch(\PDOException $pdo) {
            var_dump($pdo->getMessage());
            var_dump($pdo->getLine());
        }
    }

    private static function closeDB() : void{
        self::$dbo = NULL;
    }
}