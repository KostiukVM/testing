<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Visitor;

class VisitorsController extends Controller {
    public function index(): void
    {
        $visitors = Visitor::getAll();
        $this->render('visitors/index', ['visitors' => $visitors]);
    }

    public function add(): void
    {
        global $router;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $visitor = new Visitor();
            $visitor->name = $_POST['name'];
            $visitor->lastname = $_POST['lastname'];
            $visitor->email = $_POST['email'];
            $visitor->phone = $_POST['phone'];
            $visitor->save();
            header('Location: ' . $router->getUrl('/visitors'));
        } else {
            $this->render('/visitors/add');
        }
    }

    public function edit($id): void
    {
        global $router;
        $visitor = Visitor::getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $visitor->name = $_POST['name'];
            $visitor->lastname = $_POST['lastname'];
            $visitor->email = $_POST['email'];
            $visitor->phone = $_POST['phone'];
            $visitor->save();
            header('Location: ' . $router->getUrl('/visitors'));
        } else {
            $this->render('/visitor/edit', ['visitor' => $visitor]);
        }
    }
}