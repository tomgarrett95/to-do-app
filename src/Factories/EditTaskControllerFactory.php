<?php

namespace App\Factories;
use App\Controllers\EditTaskController;
use Psr\Container\ContainerInterface;

class EditTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): EditTaskController
    {
        $renderer = $container->get('renderer');
        $taskModel = $container->get('EditTaskModel');
        return new EditTaskController($renderer, $taskModel);
    }
}