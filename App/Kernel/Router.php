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
        $url = trim($url, '/');
        foreach ($this->routes as $route => $info) {
            if ($url === trim($route, '/')) {
                $controllerName = $info['controller'];
                $actionName = $info['action'];
                $controller = new $controllerName();
                $controller->$actionName();
                return;
            }
        }
        echo "Route not found";
    }

    public function getUrl(string $route): string
    {
        return '/' . trim($route, '/');
    }
}
