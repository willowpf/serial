<?php

require_once 'pdo.php';
require_once 'student.php';

if (isset($_POST['add_student'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $course = $_POST['course'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];

    // Create new Student object
    $student = new Student($firstname, $lastname, $address, $dob, $course);

    // Serialize the student data
    $serializedData = $student->serializeData();

    // Save serialized data to database
    $stmt = $pdo->prepare("INSERT INTO students (data) VALUES (:data)");
    $stmt->bindParam(':data', $serializedData);
    $stmt->execute();

    // Redirect back to index
    header("Location: index.php");
    exit();
}
?>
