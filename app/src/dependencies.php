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

// PDO
$container['pdo'] = function ($c) {

    $settings = $c->get('settings')['pdo'];

    try {
        $pdo = new \PDO("mysql:dbname=${settings['dbname']};host=${settings['hostname']};port=${settings['port']};charset=utf8",$settings['username'],$settings['password'],
               array(\PDO::ATTR_EMULATE_PREPARES => false)
        );
        return $pdo;

    } catch (\PDOException $e) {
        //$this->logger->info('Error! Can not MySQL DataBase Connection :'.$e->getMessage());
        var_dump('Error! Can not MySQL DataBase Connection :'.$e->getMessage());
    }
};
