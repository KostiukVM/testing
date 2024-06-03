<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller {
    public function index() {
        $books = Book::getAll();
        $this->render('books/index', ['books' => $books]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Book::add($_POST);
            header('Location: /books');
        } else {
            $genres = Genre::getAll();
            $this->render('books/add', ['genres' => $genres]);
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Book::update($id, $_POST);
            header('Location: /books');
        } else {
            $book = Book::getById($id);
            $genres = Genre::getAll();
            $this->render('books/edit', ['book' => $book, 'genres' => $genres]);
        }
    }
}
