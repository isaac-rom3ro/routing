<?php
declare(strict_types = 1);

namespace App\Connection;
use PDO;
use PDOException;

class Database {
    private ?PDO $pdo = null;
    private bool $isConnected = false;

    public function __construct($dbHOST, $dbNAME, $dbCHARSET, $dbUSERNAME, $dbPASSWORD)
    {
        try {
            $this->pdo = new PDO(
                dsn: "mysql:host=$dbHOST;dbname=$dbNAME;charset=$dbCHARSET",
                username: "$dbUSERNAME",
                password: "$dbPASSWORD",
                options: [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_STRINGIFY_FETCHES => false
                ]
            );

            $this->isConnected = true;
        } catch (PDOException $e) {
            throw new PDOException('⚠️ Database connection failed. Please check your database credentials in the .env file. If this is your first setup, create a new empty database and update your .env accordingly. (No tables are required for this route.)');
        }
    }

    public function getConnection() {
        if ($this->isConnected === true) {
            return $this->pdo;
        } 

        return false;
    }

    public function closeConnection() {
        if ($this->isConnected === true) {
            $this->pdo = null;
        }

        return false;
    }
}