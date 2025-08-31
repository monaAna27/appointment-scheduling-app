<?php

namespace data;

use PDO;
use PDOException;

class Database
{
    private $pdo;
    private static $instance = null;

    protected function __construct()
    {
        $host = 'localhost';
        $db   = 'appointment_app';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
