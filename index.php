<?php

define('ROOT_PATH', realpath(__DIR__));

require_once __DIR__ . '/config/bootstrap.php';

use App\Web\Routes;

$routes = new Routes();
$routes->addNewRoute(
    endpoint: '/', 
    method: 'GET', 
    callback: function(?array $request = null) {
        if ($request !== null) {
            echo $request["message"];
            exit;
        }

        echo "Loads without Query Parameters";
    });
// $routes->addNewRoute('/your-end-point', 'METHOD' , function() {echo 'Do somehting here!';});

$routes->run();