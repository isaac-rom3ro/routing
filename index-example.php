<?php

define('ROOT_PATH', realpath(__DIR__));

require_once ROOT_PATH . '/config/bootstrap.php';

use App\Web\Routes;
use App\Controllers\GenericController;

// ADDING NEW ROUTES
// $routes->addNewRoute('/your-end-point', 'METHOD' , function() {echo 'Do somehting here!';});

$routes = new Routes();

// QUERY PARAMETERS
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

// CONTROLLERS
$genericController = new GenericController();

// Using a Controller to handle the request
// Concept of fn(): it stores the given function making it be called only when adding () to the callback
// Go to routes->run() to see 
// But if youre too lazy like me
// If the endpoint and method matches, $this->routes[$endpoint][$method](); executes the given function in this case index()
$routes->addNewRoute(
    endpoint: $genericController->getEndpoint(),
    method: 'GET',
    callback: fn() => $genericController->index()
);
$routes->run();