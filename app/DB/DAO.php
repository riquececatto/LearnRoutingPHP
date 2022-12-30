<?php

namespace App\DB;

class DAO
{
    private static array $dbo;

    public function __construct()
    {
        self::$dbo = [
            'dbName' => '',
            'dbHost' => 'localhost:3306',
            'dbUser' => 'root',
            'dbPassword' => '159753'
        ];
    }

    protected static function openDB() {
        return new \PDO("mysql:dbname=".
            self::$dbo['dbName'].";host=".
            self::$dbo['dbHost'], 
            self::$dbo['dbUser'], 
            self::$dbo['dbPassword'], 
            [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ]
        );
    }

    protected static function closeDB(){
        unset($dbo);
    }
}