<?php
declare(strict_types = 1);

namespace App\Controllers;
use App\Controllers\Controller;

// When creating a Controller, you should extends the Controller class
class GenericController extends Controller {
    public function __construct()
    {
        // We are extending an attribute: endPoint, which is private that is way we are using getter and setter
        $this->setEndPoint("/");
    }

    // Returns a message
    // TODO -> Returns a whole page
    public function index() {
        require_once __DIR__ . '/../../resources/views/welcome.php';
    }
}