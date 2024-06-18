<?php

namespace App\Models;

use App\Kernel\Model;

use PDO;

class Genre extends Model {

    public string $name;

    // запит до бд, для отримання масиву всіх жанрів
    public static function getAll() {
        $stmt = self::$db->query("SELECT * FROM genres");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // отримати обєкт жанру по ід
    public static function getById($id)
    {
        $stmt = self::$db->prepare('SELECT * FROM genres WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(__CLASS__);
    }

    // матод для зміни або створення жанру в бд
    //якщо жанр з ід існує то змінити
    // якщо не існує, створити
    public function save(): void
    {
        if (isset($this->id)) {
            $stmt = self::$db->prepare('UPDATE genres SET name = :name WHERE id = :id');
            $stmt->execute([
                'id'      => $this->id,
                'name'    => $this->name,
            ]);

        } else {
            $stmt = self::$db->prepare('INSERT INTO genres (name) VALUES (:name)');
            $stmt->execute([
                'name'    => $this->name,

            ]);

        }
    }
}
