<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Genre;

class GenreController extends Controller {
    public function index() {
        $genres = Genre::getAll();
        $this->render('genres/index', ['genres' => $genres]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Genre::add($_POST);
            header('Location: /genres');
            exit();
        } else {
            $this->render('genres/add');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Genre::update($id, $_POST);
            header('Location: /genres');
            exit();
        } else {
            $genre = Genre::getById($id);
            $this->render('genres/edit', ['genre' => $genre]);
        }
    }
}
