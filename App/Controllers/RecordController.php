<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Record;

class RecordController extends Controller {
    public function index() {
        $records = Record::getAll();
        $this->render('records/index', ['records' => $records]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Record::add($_POST);
            header('Location: /records');
            exit();
        } else {
            $this->render('records/add');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Record::update($id, $_POST);
            header('Location: /records');
            exit();
        } else {
            $record = Record::getById($id);
            $this->render('records/edit', ['record' => $record]);
        }
    }
}
