<?php
declare(strict_types = 1);

namespace App\Controllers;

use App\Connection\Database;
use App\Models\GenericModel;
use App\Controllers\Controller;
use App\Web\Request;

// When creating a Controller, you should extends the Controller class
class GenericController extends Controller {
    public function __construct()
    {
        // We are extending an attribute: endPoint, which is private that is way we are using getter and setter
        $this->setEndPoint("/");
    }

    // Returns a message
    public function index() {
        require_once $this->view('welcome.php');
    }

    public function storeUser(?array $request = null, Database $database)
    {
        if ($request === null)
        {
            $data = Request::input();
        }

        $genericModel = new GenericModel(table: 'user', database: $database);

        return $genericModel->insert($data["name"], $database->getConnection());
    }
} 