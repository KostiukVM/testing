<?php

namespace App\Core;

class View {
    public static function render($view, $data = []): void
    {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
