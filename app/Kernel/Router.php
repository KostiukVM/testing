<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function add($route, $controller, $action): void
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($url): void
    {
        if (array_key_exists($url, $this->routes)) {
//            перевірка, чи існує в масиві $routes ключ, який відповідає заданій URL.

            $controller = $this->routes[$url]['controller'];
//             назва контролера для поточного маршруту.

            $action = $this->routes[$url]['action'];
//            методу, який потрібно викликати в контролері.

            $controller = new $controller;
            $controller->$action();
        } else {
            echo "Router not found";
        }
    }
}
