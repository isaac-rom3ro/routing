<?php
declare(strict_types = 1);

namespace App\Models;

abstract class Model {
    private string $table;

    public function getTable()
    {
        return $this->table;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }
}