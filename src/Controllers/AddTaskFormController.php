<?php

namespace App\Controllers;

use App\Models\AddTaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class AddTaskFormController
{
    private PhpRenderer $renderer;
    private AddTaskModel $addTaskModel;

    public function __construct(PhpRenderer $renderer, AddTaskModel $addTaskModel)
    {
        $this->renderer = $renderer;
        $this->addTaskModel = $addTaskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        $addResultStatus = $this->addTaskModel->addTask($data);
        $data['addResultStatus'] = $addResultStatus;
        return $this->renderer->render($response, 'task-submission.phtml', ['data' => $data]);
    }
}