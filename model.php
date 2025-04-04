<?php

require_once 'pdo.php';
require_once 'student.php';

// CREATE: Add a new student
if (isset($_POST['add_student'])) {
    $student = new Student($_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['dob'], $_POST['course']);
    $serializedData = $student->serializeData();

    $stmt = $pdo->prepare("INSERT INTO students (data) VALUES (:data)");
    $stmt->bindParam(':data', $serializedData);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

// READ: Get all students
function getAllStudents() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM students");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// UPDATE: Modify student details
if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $student = new Student($_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['dob'], $_POST['course']);
    $serializedData = $student->serializeData();

    $stmt = $pdo->prepare("UPDATE students SET data = :data WHERE id = :id");
    $stmt->bindParam(':data', $serializedData);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

//DELETE: Not working one
if (isset($_GET['delete_id'])) { 
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute();

    header("Location: index.php");
    exit();
}
