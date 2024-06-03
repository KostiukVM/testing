<?php


namespace App\Kernel;

abstract class Controller
{
    protected function render($view, $data = []): void
    {
        extract($data);
        require_once __DIR__ . '/../Views/' . $view . '.php';
    }
}
