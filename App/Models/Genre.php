<?php

namespace App\Models;

use App\Kernel\Model;

use App\Interfaces\Model_Interface;
use PDO;

class Genre extends Model implements Model_Interface {
    public static function getAll() {
        $stmt = self::$db->query("SELECT * FROM genres");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::$db->prepare("SELECT * FROM genres WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $stmt = self::$db->prepare("INSERT INTO genres (name) VALUES (:name)");
        return $stmt->execute($data);
    }

    public static function update($id, $data) {
        $data['id'] = $id;
        $stmt = self::$db->prepare("UPDATE genres SET name = :name WHERE id = :id");
        return $stmt->execute($data);
    }
}
