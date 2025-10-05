<?php

require_once __DIR__ . '/config/bootstrap.php';

use App\Controllers\GenericController;
use App\DateTime\Obsid;

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

$router->run();