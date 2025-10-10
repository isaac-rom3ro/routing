<?php

require_once __DIR__ . '/config/bootstrap.php';

use App\Web\Log;
use App\DateTime\Obsid;
use App\Controllers\GenericController;

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
        var_dump(Obsid::now()->format('Y-m-d'));
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

$router->run();