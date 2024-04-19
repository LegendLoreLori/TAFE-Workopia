<?php

class Database {
    public PDO $conn;

    /**
     * Constructor for Database class
     *
     * @param array $config
     *
     * @throws PDOException
     */
    public function __construct(array $config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};
        dbname={$config['dbname']}";

        $options = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'],
                $config['password']);
        } catch (PDOException $e) {
            throw new PDOException("Database connection failed:
             {$e->getMessage()}");
        }
    }
}