<?php

const BASE_PATH = __DIR__ . '/../';
const BASE_URL = 'http:localhost/PHP 2025/Norte Caffee/index.php/';

require BASE_PATH . 'Core/functions.php';

/**
 * all instantiation of classes will be load here
 * README for more information
*/
spl_autoload_register(function ($class) {
    // can be use for clarity
    // dump($class);

    // used due to namespace class, at controllers
    // DIRECTORY_SEPERATOR can be substituted with '/', 
    // but using this is more dynamic & will automatically design what's appropriate to your OS
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

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