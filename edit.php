<?php
require_once 'pdo.php';
require_once 'student.php';
require_once 'model.php';

// Get student data for editing
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    header("Location: index.php");
    exit();
}

$editStudent = Student::deserializeData($row['data']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-5">

<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-5">Edit Student</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="model.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="firstname" value="<?= htmlspecialchars($editStudent->firstname) ?>" class="w-full p-2 border rounded" required>
                <input type="text" name="lastname" value="<?= htmlspecialchars($editStudent->lastname) ?>" class="w-full p-2 border rounded" required>
                <input type="text" name="course" value="<?= htmlspecialchars($editStudent->course) ?>" class="w-full p-2 border rounded" required>
                <input type="text" name="address" value="<?= htmlspecialchars($editStudent->address) ?>" class="w-full p-2 border rounded" required>
                <input type="date" name="dob" value="<?= htmlspecialchars($editStudent->dob) ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="mt-4 flex space-x-4">
                <button type="submit" name="update_student" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update Student
                </button>
                <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
