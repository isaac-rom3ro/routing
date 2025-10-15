<?php

declare(strict_types = 1);

namespace App\Http;

class Pancake {
    public static function get(
        string $url,
    )
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 15
        ]);

        $response = curl_exec($curl);

        if ($response === false) {
            echo curl_error($curl);

            curl_close($curl);
            exit;
        }

        echo $response;
        curl_close($curl);
    }   

    public static function post 
    (
        string $url, 
        string $contentType, 
        array $data
    ) {

    }
}   