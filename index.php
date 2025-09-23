<?php

require_once __DIR__ . '/config/bootstrap.php';

use App\Web\Routes;
use App\Controllers\GenericController;

$routes = new Routes();
$genericController = new GenericController();

$routes->addNewRoute(
    endpoint: $genericController->getEndpoint(),
    method: GET,
    callback: fn() => $genericController->index()
);

$routes->run();