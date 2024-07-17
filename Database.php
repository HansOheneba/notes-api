<?php

class Database {
    private $conn;
    private $config;

    public function __construct() {
        $this->config = require __DIR__ . '/config.php';
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $dbConfig = $this->config['database'];
            
            $this->conn = new PDO(
                "mysql:host=" . $dbConfig['host'] . ";port=" . $dbConfig['port'] . ";dbname=" . $dbConfig['dbname'],
                $dbConfig['username'],
                $dbConfig['password']
            );
            
            $this->conn->exec("set names " . $dbConfig['charset']);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}