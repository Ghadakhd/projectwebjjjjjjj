<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/launcher/controller/ProductController.php';

$productController = new ProductController();
$product = $productController->getProductById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productController->updateProduct($_GET['id'], $_POST);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST">
        <label>Name: <input type="text" name="Name" value="<?php echo htmlspecialchars($product['Name']); ?>" required></label><br>
        <label>Price: <input type="number" name="Price" step="0.01" value="<?php echo htmlspecialchars($product['Price']); ?>" required></label><br>
        <label>Stock: <input type="number" name="Stock" value="<?php echo htmlspecialchars($product['Stock']); ?>" required></label><br>
        <label>Type: <input type="text" name="Type" value="<?php echo htmlspecialchars($product['Type']); ?>" required></label><br>
        <label>Image: <input type="text" name="Image" value="<?php echo htmlspecialchars($product['Image']); ?>" required></label><br>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
