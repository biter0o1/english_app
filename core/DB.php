<?php
require_once __DIR__ . '/../config/Config.php';

class DB {
    private static $conn;

    public static function conn() {
        if (!self::$conn) {
            self::$conn = new PDO(
                "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=" . Config::DB_CHARSET,
                Config::DB_USER,
                Config::DB_PASS
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
}