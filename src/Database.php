<?php

namespace app\src;

use PDO;
use PDOException;

class Database
{
    private $pdo;
    private string $host;
    private string $username;
    private string $password;
    private string $database;

    public function __construct()
    {
        $config = require(__DIR__ . '/../config.php');;
        $this->host = $config['DB_HOST'];
        $this->username = $config['DB_USERNAME'];
        $this->password = $config['DB_PASSWORD'];
        $this->database = $config['DB_DATABASE'];
        $this->connect();
    }

    public function connect(): void
    {
        $dsn = "mysql:host=$this->host;dbname=$this->database";

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql)
    {
        return $this->pdo->query($sql);
    }

    public function fetchArray($result)
    {
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function close(): void
    {
        $this->pdo = null;
    }
}