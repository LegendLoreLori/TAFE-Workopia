<?php
// Define DSN
$host = 'localhost';
$port = 3306; // Default for MySQL
$dbName = 'blog';
$username = 'root';
$password = '';

// Driver, port, dbname, character set, which can be turned into a variable
// Notably, user information isn't included in the DSN
$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";
echo $dsn. "<br>";
//phpinfo();
try {
    // Create PDO instance
    // Accepts the DSN, Username and Password, and optional parameters
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Database Connected...';
} catch(PDOException $e) {
    // Store exception string as variable $e
    // $e is an anonymous function
    echo 'Connection Failed: ' . $e->getMessage();
}