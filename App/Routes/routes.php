<?php


use App\Controllers\BookController;
use App\Controllers\GenreController;
use App\Controllers\LibraryController;
use App\Controllers\RecordController;
use App\Controllers\VisitorsController;
use App\Kernel\Router;


$router = new Router();

// стартова сторінка
$router->add('/', LibraryController::class, 'index');

// всі відвідувачі, додавання, редагування
$router->add('/visitors', VisitorsController::class, 'index');
$router->add('/visitors/add', VisitorsController::class, 'add');
$router->add('/visitors/edit/{id}', VisitorsController::class, 'edit');

// всі книги, додавання, редагування, видалення
$router->add('/books', BookController::class, 'index');
$router->add('/books/add', BookController::class, 'add');
$router->add('/books/edit/{id}', BookController::class, 'edit');
$router->add('/books/delete/{id}', BookController::class, 'delete');

// всі жанри, додавання, редагування
$router->add('/genres', GenreController::class, 'index');
$router->add('/genres/add', GenreController::class, 'add');
$router->add('/genres/edit/{id}', GenreController::class, 'edit');

// всі записи, додавання, повернення
$router->add('/records', RecordController::class, 'index');
$router->add('/records/add', RecordController::class, 'add');
$router->add('/records/return/{id}', RecordController::class, 'returnBook');