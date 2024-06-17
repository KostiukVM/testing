<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Genre;

class GenreController extends Controller {
    public function index() {
        $genres = Genre::getAll();
        $this->render('genres/index', ['genres' => $genres]);
    }

    public function add(): void
    {
        global $router;
        $genres = Genre::getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genre       = new Genre();
            $genre->name = $_POST['name'];;
            $genre->save();
            header('Location: ' . $router->getUrl('/genres'));
        } else {
            $this->render('genres/add', ['genres' => $genres]);
        }
    }

    public function edit($id) {
        global $router;
        $genre = Genre::getById($id);
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
            $this->render('genres/edit', ['genre' => $genre]);
        }
    }
}
