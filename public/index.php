<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel\Model;
use App\Kernel\Router;

// Ініціалізація бази даних
require_once __DIR__ . '/../config.php';
Model::init(DB_DSN, DB_USER, DB_PASS);


// Запуск маршрутів
$router = new Router();
require_once __DIR__ . '/../App/Routes/routes.php';

//dd($router);



//require_once __DIR__ . '/../App/Views/navigation.php';
$url = $_SERVER['REQUEST_URI'] ?? '/';
$router->dispatch($url);
