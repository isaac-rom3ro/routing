<?php

declare(strict_types = 1);

namespace App\Web;

class Validator {
    // Check if an endpoint exists, by keys already generated
    public static function endpointExists(
        string $endpoint, 
        array $routes
    ): bool
    {
        if (
            !array_key_exists($endpoint, $routes)
        ) {
            return false;
        }

        return true;
    }

    // Check if the method bind to the endpoint exists
    public static function methodOfEndpointExists(
        array $routes, 
        string $endpoint, $method
    ): bool 
    {
        return isset($routes[$endpoint][$method]);
    }
}