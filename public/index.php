<?php

use Core\Session;

session_start();

// Set the default timezone to Philippine Time (PHT)
date_default_timezone_set('Asia/Manila');

const BASE_PATH = __DIR__ . '/../';
const BASE_URL = 'http:localhost/PHP 2025/Norte Cafe/index.php/';

require BASE_PATH . 'Core/functions.php';

// dd(isOrderingTime());

/**
 * all instantiation of classes will be load here
 * README for more information
*/
spl_autoload_register(function ($class) {
    // can be use for clarity
    // dd($class);

    // used due to namespace class, at controllers
    // DIRECTORY_SEPERATOR can be substituted with '/', 
    // but using this is more dynamic & will automatically design what's appropriate to your OS
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

/**
 * Instead of manually doing this, we are just creating instances (Obj) of each class
 * and the spl_autoload_register() is then responsible for tracking where that class is located
 * and include it within our public/index.php
*/
// require base_path("Core/Router.php");
// require base_path("Core/Middleware/Middleware.php");
// require base_path("App/Http/Controllers/UserController.php");

$router = new Core\Router;

require BASE_PATH . 'routes.php';


/**
 * Will trigger everytime we click an <a>
*/
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (PDOException $e) {
    "Error within public/index.php {$e}";
}

Session::unflash();