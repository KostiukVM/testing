<?php

namespace App\Kernel;


class Router
{
    private array $routes = [];

    public function add(string $route, string $controller, string $action): void
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch(string $url): void
    {
        foreach ($this->routes as $route => $info) {
            $pattern = preg_replace('/\{[a-zA-Z]+\}/', '([a-zA-Z0-9_\-]+)', $route);
            if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                array_shift($matches);
                $controller = $info['controller'];
                $action = $info['action'];

                $controller = new $controller;
                call_user_func_array([$controller, $action], $matches);
                return;
            }
        }
        echo "Router not found";
    }
}

