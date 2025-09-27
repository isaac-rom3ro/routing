<?php
declare(strict_types = 1);

namespace App\Models;

use PDO;
use App\Models\Model;

class GenericModel extends Model {
    public function __construct(string $table)
    {
        $this->setTable($table);
    }

    public function insert(string $name, PDO $database)
    {
        $query = "
            INSERT INTO {$this->getTable()}
                (name)
            VALUES
                (:name)
        ";

        $stmt = $database->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt;
    }   
}