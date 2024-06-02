<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel\Model;
use App\Kernel\Router;
use App\Controllers\BookController;
use App\Controllers\GenreController;
use App\Controllers\RecordController;
use App\Controllers\VisitorsController;

// Ініціалізація бази даних
require_once __DIR__ . '/../config.php';
Model::init(DB_DSN, DB_NAME,DB_USER, DB_PASS);


// Налаштування маршрутів
$router = new Router();
//$router->add('/', VisitorsController::class, 'index');
//$router->add('/visitors/add', VisitorsController::class, 'add');
//$router->add('/visitors/edit/{id}', VisitorsController::class, 'edit');
//
$router->add('/books', BookController::class, 'index');
$router->add('/books/add', BookController::class, 'add');
$router->add('/books/edit/{id}', BookController::class, 'edit');
dd($router);
//
//$router->add('/genres', GenreController::class, 'index');
//$router->add('/genres/add', GenreController::class, 'add');
//$router->add('/genres/edit/{id}', GenreController::class, 'edit');
//
//$router->add('/records', RecordController::class, 'index');
//$router->add('/records/add', RecordController::class, 'add');
//$router->add('/records/edit/{id}', RecordController::class, 'edit');

// Запуск маршрутів
//$router->dispatch($_SERVER['REQUEST_URI']);
$router->dispatch('/books');
