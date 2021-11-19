<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', 'ViewTasksController');
    $app->get('/add-task', 'AddTaskController');
    $app->post('/add-task', 'AddTaskFormController');
    $app->get('/task/{id}', 'EditTaskController');
};
