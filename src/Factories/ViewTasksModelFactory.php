<?php

namespace App\Factories;

use App\Models\ViewTasksModel;
use Psr\Container\ContainerInterface;

class ViewTasksModelFactory
{
    public function __invoke(ContainerInterface $container): ViewTasksModel
    {
        $db = $container->get('dbConnection');
        return new ViewTasksModel($db);
    }
}