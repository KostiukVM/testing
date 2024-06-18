<?php

namespace App\Controllers;
use App\Kernel\Controller;

class LibraryController extends Controller
{
    public function index(): void
    {
        global $router;
        // відображення стартової сторінки
        $this->render('navigation', ['router'=> $router] );
    }
}