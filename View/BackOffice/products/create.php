<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/launcher/controller/ProductController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productController = new ProductController();
    $productController->createProduct($_POST);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form method="POST">
        <label>Name: <input type="text" name="Name" required></label><br>
        <label>Price: <input type="number" name="Price" step="0.01" required></label><br>
        <label>Stock: <input type="number" name="Stock" required></label><br>
        <label>Type: <input type="text" name="Type" required></label><br>
        <label>Image: <input type="text" name="Image" required></label><br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
