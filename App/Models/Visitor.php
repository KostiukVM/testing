<?php

namespace App\Models;

use App\Kernel\Model;

use App\Interfaces\Model_Interface;
use PDO;

class Visitor extends Model implements Model_Interface {
    public static function getAll() {
        $stmt = self::$db->query("SELECT * FROM visitors");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::$db->prepare("SELECT * FROM visitors WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $stmt = self::$db->prepare("INSERT INTO visitors (name, email, phone) VALUES (:name, :email, :phone)");
        return $stmt->execute($data);
    }

    public static function update($id, $data) {
        $data['id'] = $id;
        $stmt = self::$db->prepare("UPDATE visitors SET name = :name, email = :email, phone = :phone WHERE id = :id");
        return $stmt->execute($data);
    }
}
