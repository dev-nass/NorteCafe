<?php

namespace Core;

use App\Http\Controllers;
use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{

    public $routes = [];

    /**
     * Here we are making the $this->routes a multidimentional array so it can store values like:
     * $this->routes = [
     *      [
     *          'method',
     *          'uri'
     *           ...
     *      ],
     *      [
     *          'method',
     *          'uri'
     *           ...
     *      ],
     * ];
     * multiple times.
     * 
     * If we use:
     * $this->routes = [], instead of $this->routes[] = [];, this creates a single associative array
     * meaning we only store one route.
     */
    public function add($method, $uri, $controllerClass, $controllerMethod)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => "/PHP%202025/Norte%20Cafe/public/index.php/{$uri}",
            'controller_class' => $controllerClass,
            'controller_method' => $controllerMethod,
            'middleware' => null,
            'middleware_role' => null,
        ];

        // Added for middleware
        return $this;
    }

    /**
     * Used for accessing a page; clicking <a> / clicking a link, traversing the URL
    */
    public function get($uri, $controllerClass, $controllerMethod)
    {
        return $this->add('GET', $uri, $controllerClass, $controllerMethod);
    }

    /**
     * Used for every submit of form; create, update, delete
    */
    public function post($uri, $controllerClass, $controllerMethod)
    {
        return $this->add('POST', $uri, $controllerClass, $controllerMethod);
    }

    /**
     * Used for adding middleware to each route
     */
    public function only($key, $role = null)
    {
        // we are accessing the $this->routes array like this because its a multidiemnsional array
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        $this->routes[array_key_last($this->routes)]['middleware_role'] = $role;
    }

    /**
     * Iterates to every element of the 'public $routes = []' and create an instance of that
     * controller class.
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {

            // DUMP IDEAAAA (this allows item/show/{id})
            // $uriPattern = preg_replace('#\{[a-zA-Z0-9_]+\}#', '([0-9]+)', $route['uri']);
            // preg_match("#^$uriPattern$#", $uri, $matches);
            // // dd($matches);

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware'], $route['middleware_role']);

                $controllerClass = 'app\Http\Controllers\\' . $route['controller_class'];
                $controllerInstance = new $controllerClass();
                $controllerMethods = get_class_methods($controllerInstance);

                foreach ($controllerMethods as $controller_method) {
                    if ($route['controller_method'] === $controller_method) {
                        call_user_func([$controllerInstance, $controller_method]);
                        return; // added for the abort so the loop will end
                    }
                }
            }
        }

        abort(404);
    }
}
