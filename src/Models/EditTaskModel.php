<?php

namespace App\Models;

use App\Entities\Task;
use PDO;

class EditTaskModel
{
    private PDO $dbConnection;

    public function __construct(PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getTask(int $id): Task
    {
        $sql = 'SELECT '
            . '`id`, `content`, `timestamp`, `completed`, `archived` '
            . 'FROM '
            . '`tasks` '
            . 'WHERE `id`=:id;';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
}