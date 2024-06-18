<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Genre;

class GenreController extends Controller {

    //метод для відображення всіх жанрів
    public function index(): void
    {
        $genres = Genre::getAll();
        $this->render('genres/index', ['genres' => $genres]);
    }

    //метод для додавання жанру
    public function add(): void
    {
        global $router;
        $genres = Genre::getAll();  //отримати список всіх жанрів

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genre       = new Genre();    // створити новий об'єкт
            $genre->name = $_POST['name']; // надати ім'я, що приходить ПОСТОМ
            $genre->save();                // зберегти в БД
            // повернутись на сторінку з оновленими жанрами
            header('Location: ' . $router->getUrl('/genres'));
        } else {
            // якщо ПОСТ ще не прийшов, відобразити форму для додавання жанру
            $this->render('genres/add', ['genres' => $genres]);
        }
    }

    // метод для редагування жанру
    public function edit($id): void
    {
        global $router;
        $genre = Genre::getById($id); //отримати ід жанру

        if (!$genre) {
            echo "Genre not found";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genre->name = $_POST['name'];
            $genre->save();
            header('Location:' . $router->getUrl('/genres'));
            exit();
        } else {
            // якщо ПОСТ ще не прийшов, відобразити форму для редагування жанру
            $this->render('genres/edit', ['genre' => $genre]);
        }
    }
}
