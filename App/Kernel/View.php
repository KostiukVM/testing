<?php

namespace App\Kernel;

class View {
    public static function render($view, $data = []): void
    {
        extract($data);
        require_once __DIR__ . '/../Views/' . $view . '.php';
    }
}
