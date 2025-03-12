<?php

namespace Core;

use App\Http\Controllers;

class Router {

    public $routes = [];

    public function add($method, $uri, $controllerClass, $controllerMethod) {
        $this->routes[] = [
            'method' => $method,
            'uri' => "/PHP%202025/Norte%20Caffee/public/index.php/{$uri}",
            'controller_class' => $controllerClass,
            'controller_method' => $controllerMethod,
        ];
    }

    public function get($uri, $controllerClass, $controllerMethod) {
        return $this->add('GET', $uri, $controllerClass, $controllerMethod);
    }

    public function post($uri, $controllerClass, $controllerMethod) {
        return $this->add('POST', $uri, $controllerClass, $controllerMethod);
    }

    public function delete($uri, $controllerClass, $controllerMethod) {
        return $this->add('DELETE', $uri, $controllerClass, $controllerMethod);
    }

    /**
     * PATCH - update part of a resource (if available and appropriate)
    */
    public function patch($uri, $controllerClass, $controllerMethod) {
        return $this->add('PATCH', $uri, $controllerClass, $controllerMethod);
    }

    /**
     * PUT - update a resource (by replacing it with a new version)
    */
    public function put($uri, $controllerClass, $controllerMethod) {
        return $this->add('PUT', $uri, $controllerClass, $controllerMethod);
    }

    /**
     * Iterates to every element of the 'public $routes = []' and create an instance of that
     * controller class.
    */
    public function route($uri, $method) {
        foreach($this->routes as $route) {

            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                $controllerClass = 'app\Http\Controllers\\' . $route['controller_class'];
                $controllerInstance = new $controllerClass();
                $controllerMethods = get_class_methods($controllerInstance);

                foreach($controllerMethods as $controller_method) {
                    if($route['controller_method'] === $controller_method) {
                        call_user_func([$controllerInstance, $controller_method]);
                    }
                }
            }
        }

    }

}