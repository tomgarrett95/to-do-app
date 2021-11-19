<?php

namespace App\Factories;

use App\Models\EditTaskModel;
use Psr\Container\ContainerInterface;

class EditTaskModelFactory
{
    public function __invoke(ContainerInterface $container): EditTaskModel
    {
        $db = $container->get('dbConnection');
        return new EditTaskModel($db);
    }
}