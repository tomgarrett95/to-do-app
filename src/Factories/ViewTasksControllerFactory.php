<?php

namespace App\Factories;

use App\Controllers\ViewTasksController;
use Psr\Container\ContainerInterface;

class ViewTasksControllerFactory
{
    public function __invoke(ContainerInterface $container): ViewTasksController
    {
        $renderer = $container->get('renderer');
        $viewTasksModel = $container->get('ViewTasksModel');
        return new ViewTasksController($renderer, $viewTasksModel);
    }
}