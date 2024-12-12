<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/launcher/Controller/MuseumController.php';

$controller = new MuseumController();

if (isset($_GET['id'])) {
    $museum = $controller->getMuseumById($_GET['id']); // Fetch museum by ID
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'location' => $_POST['location'],
    ];

    // Check if a new image was uploaded
    if (!empty($_FILES['image']['name'])) {
        $data['image'] = 'images/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../' . $data['image']);
    } else {
        $data['image'] = $museum['image']; // Retain old image if no new one
    }

    $controller->updateMuseum($_POST['id'], $data); // Update museum

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Museum</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Edit Museum</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $museum['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($museum['name']); ?>" required><br>
        <label>Description:</label>
        <textarea name="description" required><?= htmlspecialchars($museum['description']); ?></textarea><br>
        <label>Image:</label>
        <input type="file" name="image" accept="image/*"><br>
        <label>Location:</label>
        <input type="text" name="location" value="<?= htmlspecialchars($museum['location']); ?>" required><br>
        <button type="submit">Update Museum</button>
    </form>
</body>
</html>
