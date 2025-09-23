<?php

declare(strict_types = 1);

namespace App\Controllers;

// This class is a blueprint to every new Controller 
abstract class Controller {
    // Given an endpoint
    private string $endPoint = '';

    // This endpoint can only be manipulated by getters and setters
    public function getEndpoint() {
        return $this->endPoint;
    }

    public function setEndPoint(string $endPoint) {
        $this->endPoint = $endPoint;
    }

    // index is responsible for show the content, the frontend of the endpoint itself
    // Should not be implemented here, since different controllers holds different front-ends
    public abstract function index();
}