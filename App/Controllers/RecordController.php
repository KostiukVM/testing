<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Book;
use App\Models\Record;
use App\Models\Visitor;

class RecordController extends Controller {
    public function index(): void
    {
        $records = Record::getAll(); // отримати всі записи

        // отримати масив колонкою inStock = false
        $booksOutOfStock = Record::getBookIdsOutOfStock();
        // відобразити всі записи
        $this->render('records/index', ['records' => $records, 'booksOutOfStock' => $booksOutOfStock]);
    }

    // матод додавання запису
    public function add(): void
    {
        global $router;
        $visitors = Visitor::getAll(); // отримати всіх відвідувачів
        $books = Book::getInStock();   // отримати масив книг, які є на даний момент

        // коли приходить ПОСТ - створити новий запис
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $record = new Record();
            $record->visitorId = $_POST['visitorId'];
            $record->bookId = $_POST['bookId'];
            $record->date_of_issue = $_POST['date_of_issue'];
            $record->return_date = $_POST['return_date'];
            $record->save($record); // зберегти дані, які прийшли ПОСТОМ

            //повернутись на сторінку відображення записів
            header('Location: ' . $router->getUrl('/records'));
            exit;
        } else {
            // якщо ПОСТ ще не прийшов, відобразити форму для додавання запису
            $this->render('records/add', ['books' => $books, 'visitors' => $visitors]);
        }
    }


    // метод для повернення книги
    public function returnBook($id): void
    {
        $record = Record::getById($id); // отримати ід запису

        if (!$record) {
            echo "Record with ID {$id} not found";
            return;
        }

        $book = Book::getById($record['bookId']); // отримати ід книги, з конкретного запису

        // отримати масив ід записів з неповернутими книгами
        $booksOutOfStock = Record::getBookIdsOutOfStock();
        if (!$book) {

            echo "Book with ID {$record['bookId']} not found";
            return;
        }

        // отримати запис по ід, як об'єкт
        $record = Record::getByIdObj($id);

        $book->setInStock(true);        // змінити значення inStock на true
        $record->setActive(false, $id); //змінити значення статусу запису на неактивне
        $record->returnDate($id);       // отримати дату повернення книги
        $records = Record::getAll();    // отримати оновлений список записів

        // відобразити всі записи
        $this->render('records/index', ['records' => $records,'booksOutOfStock' => $booksOutOfStock, 'book' => $book]);
    }
}
