<?php

namespace App\Core;

use PDO;

abstract class Model {
    protected static $db;

    public static function init($dsn, $user, $password): void
    {
        self::$db = new PDO($dsn, $user, $password);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

