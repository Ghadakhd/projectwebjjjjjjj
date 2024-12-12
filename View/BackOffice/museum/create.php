<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/launcher/Controller/MuseumController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'image' => 'images/' . $_FILES['image']['name'],
        'location' => $_POST['location'],
    ];

    // Move uploaded file to the images directory
    move_uploaded_file($_FILES['image']['tmp_name'], '../' . $data['image']);

    $controller = new MuseumController();
    $controller->createMuseum($data); // Add the museum to the database

    header('Location: index.php'); // Redirect back to the list
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Museum</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Add Museum</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <label>Image:</label>
        <input type="file" name="image" accept="image/*" required><br>
        <label>Location:</label>
        <input type="text" name="location" required><br>
        <button type="submit">Add Museum</button>
    </form>
</body>
</html>
