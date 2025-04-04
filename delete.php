<?php

require_once 'pdo.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
    $stmt->execute(['id' => $id]);

    
    header("Location: index.php");
    exit;
} else {
    
    header("Location: index.php");
    exit;
}
