<?php

namespace App\Models;

use PDO;

class AddTaskModel
{
    private PDO $dbConnection;

    public function __construct(PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function addTask(array $taskData): bool
    {
        $sql = 'INSERT INTO `tasks` (`content`, `timestamp`, `completed`, `archived`)
                VALUES (:taskData, CURRENT_TIMESTAMP(), 0, 0)';
        $query = $this->dbConnection->prepare($sql);
        return $query->execute(['taskData' => $taskData['content']]);
    }
}

