<?php
// DIC configuration
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\UidProcessor;
use Slim\Views\PhpRenderer;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {

    $settings = $c->get('settings')['renderer'];

    return new PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {

    $settings = $c->get('settings')['logger'];

    $logger = new Logger($settings['name']);
    $logger->pushProcessor(new UidProcessor());
    $logger->pushHandler(new StreamHandler($settings['path'], $settings['level']));

    return $logger;
};
