<?php
try {
    // Establish PDO connection using the given credentials
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=misc', 'root', '122996');

    // Set error handling mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage()); // Show detailed error message
}
//CREATE TABLE students (     id INT(11) AUTO_INCREMENT PRIMARY KEY,     data TEXT NOT NULL );
?>


