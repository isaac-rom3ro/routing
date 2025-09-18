<?php

declare(strict_types = 1);

namespace App\Web;

class Validator {
    public static function endpointExists(string $endpoint, array $routes): bool
    {
        if (
            !array_key_exists($endpoint, $routes)
        ) {
            return false;
        }

        return true;
    }

    public static function methodOfEndpointExists(array $routes, string $endpoint, $method): bool 
    {
        return isset($routes[$endpoint][$method]);
    }
}