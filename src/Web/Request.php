<?php

declare(strict_types = 1);

namespace App\Web;

use Exception;

class Request {
    public static function getMethod() {
        // If is not set the method, GET is default
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    public static function getEndpoint() {
        // Only return the endpoint
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function getQueryParameter()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    }

    public static function getAssociativeQuery($query): array | Exception
    {
        $array = explode('=', $query);
        $associativeArray = [];

        if (count($array) % 2 !== 0) {
            throw new Exception("Not a valid query parameter");
        }

        for ($i = 0; $i < count($array) / 2; $i++ ) {
            $associativeArray[$array[$i]] = $array[$i + 1];
        }

        return $associativeArray;
    }
}