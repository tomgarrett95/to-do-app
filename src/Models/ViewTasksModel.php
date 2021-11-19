<?php

namespace App\Models;

use App\Entities\Task;
use PDO;

class ViewTasksModel
{
    private PDO $dbConnection;

    public function __construct(PDO $dbConnection)
    {
        $this->dbConnection =$dbConnection;
    }

    public function getAll(): array
    {
        $sql = 'SELECT '
            . '`id`, `content`, `timestamp`, `completed`, `archived`'
            . 'FROM '
            . '`tasks`;';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute();
        return $query->fetchAll();
    }
}

