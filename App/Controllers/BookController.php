<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller {
    public function     index(): void
    {
        $books = Book::getAll();
        $this->render('books/index', ['books' => $books]);
    }

    public function add() {
        global $router;
        $genres = Genre::getAll();
        $book   = Book::getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $book           = new Book();
            $book->name     = $_POST['name'];
            $book->author   = $_POST['author'];
            $book->genreId  = $_POST['genreId'];
            $book->year     = $_POST['year'];
            $book->save();
            header('Location: ' . $router->getUrl('/books'));
        } else {
            $this->render('books/add', ['book' => $book, 'genres' => $genres]);
        }
    }

    public function edit($id): void
    {
        global $router;
        $book   = Book::getById($id);
        $genres = Genre::getAll();
        if (!$book) {
            echo "Book not found";
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $book->name     = $_POST['name'];
            $book->author   = $_POST['author'];
            $book->genreId  = $_POST['genreId'];
            $book->year     = $_POST['year'];
            $book->save();
            header('Location: ' . $router->getUrl('/books'));
        } else {
            $book = Book::getById($id);
            $this->render('books/edit', ['book' => $book, 'genres' => $genres]);
        }
    }
    public function delete($id)
    {
        $book = Book::getById($id);
        $book->delete();
        $books = Book::getAll();
        $this->render('books/index', ['books'=>$books]);
    }
}
