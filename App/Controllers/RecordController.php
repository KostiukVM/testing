<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Book;
use App\Models\Record;
use App\Models\Visitor;

class RecordController extends Controller {
    public function index(): void
    {
        $records = Record::getAll();
        $booksOutOfStock = Record::getBookIdsOutOfStock();

        $this->render('records/index', ['records' => $records, 'booksOutOfStock' => $booksOutOfStock]);
    }

    public function add(): void
    {
        global $router;
        $visitors = Visitor::getAll();
        $books = Book::getInStock();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $record = new Record();
            $record->visitorId = $_POST['visitorId'];
            $record->bookId = $_POST['bookId'];
            $record->date_of_issue = $_POST['date_of_issue'];
            $record->return_date = $_POST['return_date'];
            $record->save($record);

            header('Location: ' . $router->getUrl('/records'));
            exit;
        } else {
            $this->render('records/add', ['books' => $books, 'visitors' => $visitors]);
        }
    }

    public function returnBook($id): void
    {
        $record = Record::getById($id);

        if (!$record) {
            echo "Record with ID {$id} not found";
            return;
        }

        $book = Book::getById($record['bookId']);
        $booksOutOfStock = Record::getBookIdsOutOfStock();
        if (!$book) {

            echo "Book with ID {$record['bookId']} not found";
            return;
        }
        $book->setInStock(true);
        $records = Record::getAll();
        $this->render('records/index', ['records' => $records,'booksOutOfStock' => $booksOutOfStock, 'book' => $book]);
    }
}
