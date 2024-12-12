<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/launcher/Controller/MuseumController.php';

$controller = new MuseumController();
$museums = $controller->getMuseums();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Museums</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Museum Management</h1>
    <a href="create.php">Add New Museum</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($museums as $museum): ?>
                <tr>
                    <td><?= $museum['id']; ?></td>
                    <td><?= htmlspecialchars($museum['name']); ?></td>
                    <td><?= htmlspecialchars($museum['description']); ?></td>
                    <td><img src="../<?= htmlspecialchars($museum['image']); ?>" width="100" /></td>
                    <td><?= htmlspecialchars($museum['location']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $museum['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?= $museum['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
