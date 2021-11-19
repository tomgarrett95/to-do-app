<?php

namespace App\Factories;

use App\Models\AddTaskModel;
use Psr\Container\ContainerInterface;

class AddTaskModelFactory
{
    public function __invoke(ContainerInterface $container): AddTaskModel
    {
        $db = $container->get('dbConnection');
        return new AddTaskModel($db);
    }
}