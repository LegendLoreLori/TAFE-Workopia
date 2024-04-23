<?php

class Database
{
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
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'],
                $config['password'], $options);
        } catch (PDOException $e) {
            throw new PDOException("Database connection failed:
             {$e->getMessage()}");
        }
    }

    /**
     * Query the database
     *
     * @param string $query
     *
     * @return PDOStatement
     *
     * @throws PDOException
     */
    public function query (string $query): PDOStatement
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new PDOException("Query failed: {$e->getMessage()}");
        }
    }
}