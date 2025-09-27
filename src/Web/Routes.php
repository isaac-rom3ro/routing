<?php

declare (strict_types = 1);

namespace App\Web;

use Exception;

class Routes
{
    private array $routes = [];

    public function addNewRoute(string $endpoint, string $method, callable $callback): void
    {
        $method = strtoupper($method); // post -> POST

        // routes
        // └── /users
        // ├── POST -> callback function
        // └── GET  -> callback2 function
        $this->routes[$endpoint][$method] = $callback;
    }

    public function run(): void
    {
        $method = Request::getMethod(); 
        $endpoint = Request::getEndpoint(); 

        // In Both cases it will kill the connection
        
        // If there are no routes for that endpoint
        if (
            Validator::endpointExists($endpoint, $this->routes) === false
        ) {
            die(ApiResponse::respondNotFound()); // 404 
        }

        // If there are no methods to handle that endpoint
        if (
            Validator::methodOfEndpointExists($this->routes, $endpoint, $method) === false
        ) {
            die(ApiResponse::respondMethodNotAllowed()); // 405
        }

        $query = Request::getQueryParameter();

        // Run your function without Query Parameter
        if (empty($query)) {
            $this->loadWithoutQueryParameters($endpoint, $method);
            
            exit;
        }
        
        // Run your function with Query Parameter
        try { 
            $associativeQuery = Request::getAssociativeQuery($query);
        } catch (Exception $e) {
            die(ApiResponse::respondBadRequest());
        }
        
        // Note that if you wanna handle the content of your query parameter, you need to treat them in the method associated with the endpoint
        $this->loadWithQueryParameters($endpoint, $method, $associativeQuery);
        exit;
    }
    
    private function loadWithoutQueryParameters(string $endpoint, string $method)
    {
        $this->routes[$endpoint][$method](); // Execute the callback
    }
    
    private function loadWithQueryParameters(string $endpoint, string $method, array $associativeQuery)
    {
        $this->routes[$endpoint][$method]($associativeQuery); // Execute the callback passing the query parameter
    }
}