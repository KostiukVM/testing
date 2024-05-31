<?php

namespace App\Interfaces;

interface Model_Interface {
    public static function getAll();
    public static function getById($id);
    public static function add($data);
    public static function update($id, $data);
}
