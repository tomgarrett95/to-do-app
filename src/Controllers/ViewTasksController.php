<?php

namespace App\Controllers;

use App\Models\ViewTasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class ViewTasksController
{
    private PhpRenderer $renderer;
    private ViewTasksModel $viewTasksModel;

    public function __construct(PhpRenderer $renderer, ViewTasksModel $viewTasksModel)
    {
        $this->renderer = $renderer;
        $this->viewTasksModel = $viewTasksModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $tasksArray = $this->viewTasksModel->getAll();
        return $this->renderer->render($response, 'view-tasks.phtml', ['tasks' => $tasksArray]);
    }
}