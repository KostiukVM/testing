<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Book;

class BookController extends Controller {
    public function index() {
        $books = Book::getAll();
        $this->render('books/index', ['books' => $books]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Book::add($_POST);
            header('Location: /books');
            exit();
        } else {
            $this->render('books/add');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Book::update($id, $_POST);
            header('Location: /books');
            exit();
        } else {
            $book = Book::getById($id);
            $this->render('books/edit', ['book' => $book]);
        }
    }
}
