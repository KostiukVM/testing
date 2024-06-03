<?php

namespace App\Models;

use App\Kernel\Model;

use App\Interfaces\Model_Interface;
use PDO;

class Book extends Model implements Model_Interface {
    public static function getAll() {
        $stmt = self::$db->query("SELECT b.id, b.name as book_name, a.name as author_name, g.name as genre_name 
                                  FROM books b
                                  JOIN genres g ON b.genre_id = g.id");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::$db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $stmt = self::$db->prepare("INSERT INTO books (name, author, year, genereId) 
                                    VALUES (:name, :author, :year, :genereId)");
        return $stmt->execute($data);
    }


    public static function update($id, $data) {
        $data['id'] = $id;
        $stmt = self::$db->prepare(
            "UPDATE books SET 
                name    = :name, 
                author  = :author, 
                year    = :year, 
                enereId = :genereId  
            WHERE id = :id");
        return $stmt->execute($data);
    }
}
