<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller {
    //метод для відображення всіх книг
    public function index(): void
    {
        $books = Book::getAll();
        $this->render('books/index', ['books' => $books]);
    }

    //метод для додавання книги
    public function add(): void
    {
        global $router;
        $genres = Genre::getAll(); //отримати всі жанри
        $book   = Book::getAll();  //отримати всі книги

        // коли приходить ПОСТ - створити нову книгу
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $book           = new Book();
            $book->name     = $_POST['name'];
            $book->author   = $_POST['author'];
            $book->genreId  = $_POST['genreId'];
            $book->year     = $_POST['year'];
            $book->save(); // зберегти дані, які прийшли ПОСТОМ

            //повернутись на сторінку відображення книг
            header('Location: ' . $router->getUrl('/books'));
            exit;
        } else {
            // якщо ПОСТ ще не прийшов, відобразити форму для додавання книги
            $this->render('books/add', ['book' => $book, 'genres' => $genres]);
        }
    }

    // метод для редагування книги
    public function edit($id): void
    {
        global $router;
        $book   = Book::getById($id); // отримати ід книги
        $genres = Genre::getAll();    // отримати всі жанри

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
            // повернутися на оновлений список книг
            header('Location: ' . $router->getUrl('/books'));
        } else {
            // якщо ПОСТ ще не прийшов, відобразити форму для редагування книги
            $this->render('books/edit', ['book' => $book, 'genres' => $genres]);
        }
    }

    // метод для видалення книги
    public function delete($id): void
    {
        $book = Book::getById($id); // отримати ід книги
        $book->delete();            // видалити
        $books = Book::getAll();    // отримати новий список книг
        // відобразити оновлений список книг
        $this->render('books/index', ['books'=>$books]);
    }
}
