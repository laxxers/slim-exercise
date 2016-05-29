<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // Renderer settings
        'view' => [
            'template_path' => __DIR__ . '/templates/',
            'twig' => [
                'cache' => __DIR__ . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ]
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],

        'db' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'slim_skeleton',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ],
];
