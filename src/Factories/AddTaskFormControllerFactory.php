<?php

namespace App\Factories;

use App\Controllers\AddTaskFormController;
use Psr\Container\ContainerInterface;

class AddTaskFormControllerFactory
{
    public function __invoke(ContainerInterface $container): AddTaskFormController
    {
        $renderer = $container->get('renderer');
        $addTaskModel = $container->get('AddTaskModel');
        return new AddTaskFormController($renderer, $addTaskModel);
    }
}