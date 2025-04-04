<?php
require_once 'pdo.php';
require_once 'student.php';
require_once 'model.php';


$rows = getAllStudents();
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

    
    <form action="model.php" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-5">
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
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($rows)): ?>
                    <?php foreach ($rows as $row): ?>
                        <?php $student = Student::deserializeData($row['data']); ?>
                        <tr>
                            <td class="p-2 border"><?= htmlspecialchars($student->firstname) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($student->lastname) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($student->course) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($student->address) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($student->dob) ?></td>
                            <td class="p-2 border text-center">
                                <a href="edit.php?id=<?= $row['id'] ?>" 
                                   class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700">
                                    Edit
                                </a>
                                <a href="delete.php?id=<?= $row['id'] ?>" 
                                   class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700"
                                   onclick="return confirm('Are you sure you want to delete this student?');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">No records found. Add some students!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
