<?php

namespace App\Kernel;

use PDO;
use PDOException;

abstract class Model {
    protected static $db;

    public static function init($dsn, $user, $password): void
    {
        try {
            self::$db = new PDO($dsn, $user, $password);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
