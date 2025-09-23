<?php

// Points to root directory of the project
define('ROOT_PATH', realpath(__DIR__ . '/..'));

// Instead of using 'METHOD' just write it down, good practice make it standard, yea you can add more if you wanna.
define('GET', 'GET');
define('POST', 'POST');
define('PUT', 'PUT');
define('PATCH', 'PATCH');
define('DELETE', 'DELETE');

require_once ROOT_PATH . '/vendor/autoload.php';