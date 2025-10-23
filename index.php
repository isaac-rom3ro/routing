<?php

require_once __DIR__ . '/config/bootstrap.php';

use App\Controllers\GenericController;

$genericController = new GenericController();

$router->addNewRoute(
    endpoint: $genericController->getEndpoint(),
    method: GET,
    callback: fn() => $genericController->index()
);

$router->run();