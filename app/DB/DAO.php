<?php

namespace App\DB;

class DAO
{
    private array $dbo;

    public function __construct()
    {
        $this->dbo = [
            'dbName' => 'example',
            'dbHost' => 'localhost:3306',
            'dbUser' => 'riquececatto',
            'dbPassword' => '159753'
        ];
    }

    public function openDB() {
        try {
            if(!is_null($this->dbo)) {
                return new \PDO("mysql:dbname=".$this->dbo['dbName'].";host=".$this->dbo['dbHost'], $this->dbo['dbUser'], $this->dbo['dbPassword'], 
                    [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ]
                );
            }
        } catch(\PDOException $pdo) {
            var_dump($pdo->getMessage());
        }
    }

    public function closeDB(){
        unset($this->dbo);
    }
}