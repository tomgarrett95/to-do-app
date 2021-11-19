<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['dbConnection'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['db'];
        $db = new PDO($settings['host'] . $settings['dbname'], $settings['username'], $settings['password']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    $container['AddTaskController'] = DI\Factory('App\Factories\AddTaskControllerFactory');
    $container['AddTaskModel'] = DI\Factory('App\Factories\AddTaskModelFactory');
    $container['AddTaskFormController'] = DI\Factory('App\Factories\AddTaskFormControllerFactory');
    $container['EditTaskController'] = DI\Factory('App\Factories\EditTaskControllerFactory');
    $container['EditTaskModel'] = DI\Factory('App\Factories\EditTaskModelFactory');
    $container['ViewTasksController'] = DI\Factory('App\Factories\ViewTasksControllerFactory');
    $container['ViewTasksModel'] = DI\Factory('App\Factories\ViewTasksModelFactory');

    $containerBuilder->addDefinitions($container);
};
