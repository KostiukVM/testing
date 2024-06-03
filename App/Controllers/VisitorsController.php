<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Visitor;

// Приклад контролера для VisitorsController
class VisitorsController extends Controller {
    public function index() {
        $visitors = Visitor::getAll();
        $this->render('visitors/index', ['visitors' => $visitors]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Visitor::add($_POST);
            header('Location: /visitors');
        } else {
            $this->render('visitors/add', []);
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Visitor::update($id, $_POST);
            header('Location: /visitors');
        } else {
            $visitor = Visitor::getById($id);
            $this->render('visitors/edit', ['visitor' => $visitor]);
        }
    }
}
