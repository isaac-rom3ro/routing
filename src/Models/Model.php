<?php
declare(strict_types = 1);

namespace App\Models;

use PDO;
use App\Connection\Database;

abstract class Model {
    private string $table;
    private Database $database;
    private bool $tableExists;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setTable($table)
    {
        $this->table = $table;


    }

    public static function checkIfTableExists(PDO $conn)
    {
        $query = "SHOW TABLES";

        $stmt = $conn->exec($query);

        return $stmt !== 0 ? true : false;
    }
}