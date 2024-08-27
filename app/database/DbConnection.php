<?php

namespace App\Database;

class DbConnection
{
    private static $instance = null;
    private $conn;

    public static $servername = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $database = "WEB42"; // Datenbankname

    private function __construct()
    {
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $this->conn->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }
    public function getConnection()
    {
        return $this->conn;
    }
}
