<?php

namespace App\Models;

use App\Core\Model;

use App\Interfaces\Model_Interface;
use PDO;

class Book extends Model implements Model_Interface{
    public static function getAll() {
        $stmt = self::$db->query("SELECT * FROM book");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::$db->prepare("SELECT * FROM book WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $stmt = self::$db->prepare("INSERT INTO book (name, author, year, genereId) 
                                    VALUES (:name, :author, :year, :genereId)");
        return $stmt->execute($data);
    }


    public static function update($id, $data) {
        $data['id'] = $id;
        $stmt = self::$db->prepare(
            "UPDATE book SET 
                name = :name, 
                author = :author, 
                year = :year, 
                enereId = :genereId  
            WHERE id = :id");
        return $stmt->execute($data);
    }
}
