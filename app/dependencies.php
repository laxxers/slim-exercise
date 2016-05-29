<?php

$container = $app->getContainer();

// view renderer
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// database
use Illuminate\Database\Capsule\Manager as Capsule;
$setting = include('settings.php');
$capsule = new Capsule;
$capsule->addConnection($setting['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['App\Action\HomeAction'] = function ($c) use ($app) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'));
};

$container['App\Action\AdminAction'] = function ($c) use ($app) {
    return new App\Action\AdminAction($c->get('view'), $c->get('logger'));
};
