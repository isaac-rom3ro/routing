<?php

require_once __DIR__ . '/config/bootstrap.php';

use App\Web\Routes;

$routes = new Routes();

$routes->addNewRoute(
    endpoint: '/welcome',
    method: 'GET',
    callback: function() {
        echo "WELCOME";
    }
);

$routes->run();