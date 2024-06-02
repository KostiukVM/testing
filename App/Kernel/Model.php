<?php

namespace App\Kernel;

use PDO;

abstract class Model {
    protected static $db;

    public static function init($host, $dbname, $username, $password): void
    {
        self::$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}



