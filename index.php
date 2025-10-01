<?php

require_once __DIR__ . '/config/bootstrap.php';

use App\Controllers\GenericController;

$genericController = new GenericController();

$routes->addNewRoute(
    endpoint: $genericController->getEndpoint(),
    method: GET,
    callback: fn() => $genericController->index()
);

$routes->addNewRoute(
    endpoint: '/user',
    method: POST,
    callback: fn($request = null) => $genericController->storeUser($request, $database)
);

$routes->run();