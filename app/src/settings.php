<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name'  => 'app',
            'level' => Monolog\Logger::DEBUG,
            'path'  => __DIR__ . '/../logs/app.log',
        ],
        // PDO
        'pdo' => [
            'hostname' => 'db',
            'port'     => '3306',
            'dbname'   => 'slimapp',
            'username' => 'root',
            'password' => 'root',
        ],
    ],
];
