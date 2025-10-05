<?php

declare(strict_types = 1);

namespace App\Web;

use Exception;

// This class is responsible for any request action
class Request {
    // Get the method used by the request, for example: GET, POST, PATCH, PUT, DELETE
    public static function getMethod(): string
    {
        // If is not set the method, GET is default
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    // Get the endpoint used, for example: /user
    public static function getEndpoint(): string  
    {
        // Only return the endpoint
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    // If settled in your script, it will only get the parameters passed by the url, which is useful for working with showing data for example: user/1 : return some informations about that specific user
    public static function getQueryParameter(): string | null
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    }

    // Given a valid query for example: name=John&age=20
    public static function getAssociativeQuery($query): array | Exception
    {
        // Replace special characters , for example: name=John&age=20 -> name|John|age|20
        // And spaces common written as %20 and + in urls as ' '
        // For example: John+Doe or John%20Doe -> John Doe in both cases
        // I will add a more concise approach later for dealing with those cases and others
        $decodedQuery = self::decodeQuery(query: $query);

        // Turn our string into a new array
        // name|John|age|20 -> $array = [name, John, age, 20]
        $array = explode('|', $decodedQuery);
        $associativeArray = [];

        // Just a small verification
        // TO-DO: think in a better approach
        if (count($array) % 2 !== 0) {
            throw new Exception("Not a valid query parameter");
        }

        // Assign each value to a key
        // In this specific scenerio that ive developed it works like this:
        // our array follows a rule: [key, value, key, value, key, value]
        // So even numbers are key and odds are value
        for ($i = 0; $i < count($array) / 2 + 1; $i+= 2) {
            $key = $array[$i]; // name
            $value = $array[$i + 1]; // John

            $associativeArray[$key] = $value;
        }

        // Return an associative array containing all the query parameters 
        return $associativeArray;
    }

    // Return body, data, query not passed by the url
    // JSON, Form Data...
    public static function input()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    // Decode a query
    // Not finished
    private static function decodeQuery(string $query)
    {
        return str_replace(
            ['+', '%20'], ' ', str_replace( // Space Symbol
                ['=', '%3D'], '|', str_replace( // Assign Symbol
                    ['&', '%26'], '|', $query)) // Ampersand Symbol
            );
    }
}