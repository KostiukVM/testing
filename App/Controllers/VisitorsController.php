<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Visitor;

class VisitorsController extends Controller {
    //метод для відображення всіх відвідувачів
    public function index(): void
    {
        $visitors = Visitor::getAll(); // отримати всіх відвідувачів
        $this->render('visitors/index', ['visitors' => $visitors]);
    }

    // метод для додавання відвідувача
    public function add(): void
    {
        global $router;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $visitor = new Visitor();                   // створити новий об'єкт

            // записати дані, що приходять ПОСТОМ
            $visitor->name = $_POST['name'];
            $visitor->lastname = $_POST['lastname'];
            $visitor->email = $_POST['email'];
            $visitor->phone = $this->editphone($_POST['phone']);
            $visitor->save(); // зберегти дані

            //повернутись на сторінку відображення відвідувачів
            header('Location: ' . $router->getUrl('/visitors'));
        } else {
            // якщо ПОСТ ще не прийшов, відобразити форму для додавання відвідувача
            $this->render('/visitors/add');
        }
    }
    // метод обробки номеру
    public function editphone(string $str):string
    {
        str_replace(' ', '', $str);     // прибрати пробіли
        return $str;
    }

    // метод для редагування відвідувача
    public function edit($id): void
    {
        global $router;
        $visitor = Visitor::getById($id); // отримати ід відвідувача
        if (!$visitor) {
            echo "Visitor not found";
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $visitor->name = $_POST['name'];
            $visitor->lastname = $_POST['lastname'];
            $visitor->email = $_POST['email'];
            $visitor->phone = $this->editphone($_POST['phone']);
            $visitor->save();
            // повернутися на оновлений список відвідувачів
            header('Location: ' . $router->getUrl('/visitors'));
        } else {
            // якщо ПОСТ ще не прийшов, відобразити форму для редагування відвідувача
            $this->render('/visitors/edit', ['visitor' => $visitor]);
        }
    }
}