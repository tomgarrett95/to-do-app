<?php

namespace App\Controllers;

use App\Models\EditTaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class EditTaskController
{
    private PhpRenderer $renderer;
    private EditTaskModel $editTasksModel;

    public function __construct(PhpRenderer $renderer, EditTaskModel $editTaskModel)
    {
        $this->renderer = $renderer;
        $this->editTasksModel = $editTaskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $task = $this->editTasksModel->getTask($args['id']);
        return $this->renderer->render($response, 'edit-task.phtml', ['task' => $task]);
    }
}