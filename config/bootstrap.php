<?php

// Some dependencies
use Dotenv\Dotenv;
use App\Connection\Database;
use App\Web\Routes;

// Points to root directory of the project
define('ROOT_PATH', realpath(__DIR__ . '/..'));

// Instead of using 'METHOD' just write it down, good practice make it standard, yea you can add more if you wanna.
define('GET', 'GET');
define('POST', 'POST');
define('PUT', 'PUT');
define('PATCH', 'PATCH');
define('DELETE', 'DELETE');

// Autoloader
require_once ROOT_PATH . '/vendor/autoload.php'; 

// Using ENV variables
$dotEnv = Dotenv::createImmutable(ROOT_PATH, '.env');
$dotEnv->safeLoad();

// Instatiating a new database object
$database = new Database(
    dbHOST: $_ENV['DB_HOST'],
    dbNAME: $_ENV['DB_NAME'], 
    dbCHARSET: $_ENV['DB_CHARSET'], 
    dbUSERNAME: $_ENV['DB_USERNAME'], 
    dbPASSWORD: $_ENV['DB_PASSWORD']
);

// Creates a route object
$routes = new Routes();