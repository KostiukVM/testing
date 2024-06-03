<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Record;

class RecordController extends Controller {
    public function index() {
        $records = Record::getAll();
        $this->render('record/index', ['records' => $records]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Record::add($_POST);
            header('Location: /record');
            exit();
        } else {
            $books = Book::getAll();
            $genres = Genre::getAll();
            $this->render('records/add', ['books' => $books, 'genres' => $genres]);
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Record::update($id, $_POST);
            header('Location: /records');
        } else {
            $record = Record::getById($id);
            $books = Book::getAll();
            $genres = Genre::getAll();
            $this->render('records/edit', ['record' => $record, 'books' => $books, 'genres' => $genres]);
        }
    }
}
