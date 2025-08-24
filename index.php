<?php

define('ROOT_PATH', realpath(__DIR__));

require_once __DIR__ . '/config/bootstrap.php';

use App\Web\Routes;

$routes = new Routes();
$routes->addNewRoute('/', 'GET', function() {echo 'Welcome!';});
$routes->addNewRoute('/your-end-point', 'GET', function() {echo 'Do somehting here!';});

$routes->run();