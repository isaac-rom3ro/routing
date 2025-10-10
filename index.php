<?php

require_once __DIR__ . '/config/bootstrap.php';

use App\Web\Log;
use App\DateTime\Obsid;
use App\Controllers\GenericController;
use App\Http\Pancake;

$genericController = new GenericController();

$router->addNewRoute(
    endpoint: $genericController->getEndpoint(),
    method: GET,
    callback: fn() => $genericController->index()
);

$router->addNewRoute(
    endpoint: '/date',
    method: GET,
    callback: function () {
        echo "Hello World";
    }
);

$router->addNewRoute(
    endpoint: '/log',
    method: GET,
    callback: function () {
        // Log::create('erros');
        Log::add('erros','Attempt failed to connect to database');
    }
);

$router->addNewRoute(
    endpoint:'/pancake',
    method: GET,
    callback: function () {
        Pancake::get('asd');
    }
);

$router->addNewRoute(
    endpoint: '/user',
    method:GET,
    callback: fn($parameters) => function ($parameters) {
        
    }
);

$router->run();