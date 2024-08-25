<?php

class Database{


public static $host = 'localhost';
public static $dbName = 'WEB42';
public static $username = 'root';
public static $password = '';

public static function connect() {
    try {
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}



}

