<?php

namespace App\Models;

use App\Core\Model;

use App\Interfaces\Model_Interface;
use PDO;

class Genre extends Model implements Model_Interface{
    public static function getAll() {
        $stmt = self::$db->query("SELECT * FROM genre");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::$db->prepare("SELECT * FROM genre WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $stmt = self::$db->prepare("INSERT INTO genre (name) VALUES (:name)");
        return $stmt->execute($data);
    }

    public static function update($id, $data) {
        $data['id'] = $id;
        $stmt = self::$db->prepare("UPDATE genre SET name = :name WHERE id = :id");
        return $stmt->execute($data);
    }
}
