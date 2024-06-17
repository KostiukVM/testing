<?php

namespace App\Models;

use App\Kernel\Model;

use PDO;

class Genre extends Model {

    public string $name;

    public static function getAll() {
        $stmt = self::$db->query("SELECT * FROM genres");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getById($id)
    {
        $stmt = self::$db->prepare('SELECT * FROM genres WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(__CLASS__);
    }

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
