<?php

declare (strict_types = 1);

namespace App\Web;

class Routes
{
    private array $routes = [];

    public function addNewRoute(string $path, string $method, callable $callback): void
    {
        $method = strtoupper($method); // post -> POST

        // routes
        // └── /users
        // ├── POST -> callback function
        // └── GET  -> callback2 function
        $this->routes[$path][$method] = $callback;
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET'; // If is not set the method, GET is default
        $uri = strtok($_SERVER['REQUEST_URI'], '?'); // Remove query string, necessary to check the endpoint

        // query in development...
        // parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $query);

        // Both cases it will kill the connection
        if (!array_key_exists($uri, $this->routes)) {
            die(ApiResponse::respondNotFound()); // 404 
        }
        if (!isset($this->routes[$uri][$method])) {
            die(ApiResponse::respondMethodNotAllowed()); // 405
        }

        // if exists $routes[user][POST]() -> (): executes your script
        $this->routes[$uri][$method](); // Execute the callback
        return;
    }
}
