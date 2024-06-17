<?php

namespace App\Models;

use App\Kernel\Model;
use PDO;

class Visitor extends Model {
    public int $id;
    public string $name;
    public string $lastname;
    public string $email;
    public string $phone;

    public static function getAll() {
        $stmt = self::$db->query("SELECT * FROM visitors");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::$db->prepare("SELECT * FROM visitors WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(__CLASS__);
    }

    public function save(): void
    {
        if (isset($this->id)) {
            $stmt = self::$db->prepare("UPDATE visitors SET name = :name, lastname = :lastname, email = :email, phone = :phone WHERE id = :id");
            $stmt->execute([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
                'id' => $this->id
            ]);
        } else {
            $stmt = self::$db->prepare("INSERT INTO visitors (name, lastname, email, phone) VALUES (:name, :lastname, :email, :phone)");
            $stmt->execute([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone
            ]);
        }
    }

}
