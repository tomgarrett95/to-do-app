<?php

namespace App\Factories;

use App\Controllers\AddTaskController;
use Psr\Container\ContainerInterface;

class AddTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): AddTaskController
    {
        $renderer = $container->get('renderer');
        $addTaskModel = $container->get('AddTaskModel');
        return new AddTaskController($renderer, $addTaskModel);
    }
}