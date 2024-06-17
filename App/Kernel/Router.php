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
            $route = trim($route, '/');
            $routePattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $route);

            if (preg_match('#^' . $routePattern . '$#', $url, $matches)) {
                array_shift($matches);

                $controllerName = $info['controller'];
                $actionName = $info['action'];
                $controller = new $controllerName();

                call_user_func_array([$controller, $actionName], $matches);
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
