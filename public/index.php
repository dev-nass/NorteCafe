<?php

use Core\Session;

session_start();

// Set the default timezone to Philippine Time (PHT)
date_default_timezone_set('Asia/Manila');

const BASE_PATH = __DIR__ . '/../';
const BASE_URL = 'http:localhost/Projects2025/NorteCafe/public/index.php/';

require BASE_PATH . 'Core/functions.php';

// dd(isOrderingTime());

/**
 * all instantiation of classes will be load here
 * README for more information
 */
spl_autoload_register(function ($class) {
    // Convert namespace to directory
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    // Fix for App namespace folder
    if (strpos($file, 'App' . DIRECTORY_SEPARATOR) === 0) {
        $file = str_replace('App' . DIRECTORY_SEPARATOR, 'app' . DIRECTORY_SEPARATOR, $file);
    }

    $file = base_path($file);

    if (file_exists($file)) {
        require $file;
    } else {
        dd("Autoload failed: $file");
    }
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