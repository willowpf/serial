<?php
require_once 'pdo.php';
require_once 'student.php';

// Fetch all student records
$stmt = $pdo->query("SELECT * FROM students");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-5">

<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-5">Student Management System</h1>

    <!-- Form to Add New Student -->
    <form action="process.php" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-5">
        <div class="grid grid-cols-2 gap-4">
            <input type="text" name="firstname" placeholder="First Name" class="w-full p-2 border rounded" required>
            <input type="text" name="lastname" placeholder="Last Name" class="w-full p-2 border rounded" required>
            <input type="text" name="course" placeholder="Course" class="w-full p-2 border rounded" required>
            <input type="text" name="address" placeholder="Address" class="w-full p-2 border rounded" required>
            <input type="date" name="dob" class="w-full p-2 border rounded" required>
        </div>
        <button type="submit" name="add_student" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Student
        </button>
    </form>

    <!-- Display Student Records in Table -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Student List</h2>
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">First Name</th>
                    <th class="p-2 border">Last Name</th>
                    <th class="p-2 border">Course</th>
                    <th class="p-2 border">Address</th>
                    <th class="p-2 border">DOB</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($rows) > 0): ?>
                    <?php foreach ($rows as $row): ?>
                        <?php $student = Student::deserializeData($row['data']); ?>
                        <tr>
                            <td class="p-2 border"><?= htmlspecialchars($student->firstname) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($student->lastname) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($student->course) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($student->address) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($student->dob) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">No records found. Add some students!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
