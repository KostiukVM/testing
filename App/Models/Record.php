<?php

namespace App\Models;

use App\Kernel\Model;
use PDO;

class Record extends Model {
    public static function getAll() {
        $stmt = self::$db->query("SELECT records.id, records.name AS record_name, books.name AS book_name, genres.name AS genre_name 
                                  FROM records 
                                  JOIN books ON records.book_id = books.id 
                                  JOIN genres ON records.genre_id = genres.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::$db->prepare("SELECT records.id, records.name AS record_name, books.name AS book_name, genres.name AS genre_name 
                                    FROM records 
                                    JOIN books ON records.book_id = books.id 
                                    JOIN genres ON records.genre_id = genres.id 
                                    WHERE records.id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $stmt = self::$db->prepare("INSERT INTO records (name, book_id, genre_id) VALUES (:name, :book_id, :genre_id)");
        return $stmt->execute($data);
    }

    public static function update($id, $data) {
        $data['id'] = $id;
        $stmt = self::$db->prepare("UPDATE records SET name = :name, book_id = :book_id, genre_id = :genre_id WHERE id = :id");
        return $stmt->execute($data);
    }
}
