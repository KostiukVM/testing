<?php
global $router;
require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel\Model;

// Ініціалізація бази даних
require_once __DIR__ . '/../config.php';
Model::init(DB_DSN, DB_USER, DB_PASS);

require_once __DIR__ . '/../App/Views/navigation.html';

// Запуск маршрутів
//require_once __DIR__ . '/../App/Routes/routes.php';

//$url = $_SERVER['REQUEST_URI'] ?? '/';
//$router->dispatch($url);
