<?php

namespace App\Kernel;

class Router
{
    private array $routes = [];

    public function add(string $route, string $controller, string $action): void
    {
        $this->routes[$route] = compact('controller', 'action');
    }

    public function dispatch(string $url): void
    {
        if (array_key_exists($url, $this->routes)) {
            $controllerName = $this->routes[$url]['controller'];
            $actionName = $this->routes[$url]['action'];
            $controller = new $controllerName();
            $controller->$actionName();
        } else {
            echo "Router not found";
        }
    }
}
