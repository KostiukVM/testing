<?php


use App\Controllers\BookController;
use App\Controllers\GenreController;
use App\Controllers\LibraryController;
use App\Controllers\RecordController;
use App\Controllers\VisitorsController;
use App\Kernel\Router;


$router = new Router();


$router->add('/', LibraryController::class, 'index');

$router->add('/visitors', VisitorsController::class, 'index');
$router->add('/visitors/add', VisitorsController::class, 'add');
$router->add('/visitors/edit/{id}', VisitorsController::class, 'edit');

$router->add('/books', BookController::class, 'index');
$router->add('/books/add', BookController::class, 'add');
$router->add('/books/edit/{id}', BookController::class, 'edit');


$router->add('/genres', GenreController::class, 'index');
$router->add('/genres/add', GenreController::class, 'add');
$router->add('/genres/edit/{id}', GenreController::class, 'edit');

$router->add('/records', RecordController::class, 'index');
$router->add('/records/add', RecordController::class, 'add');
$router->add('/records/edit/{id}', RecordController::class, 'edit');