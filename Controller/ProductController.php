<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/launcher/Model/Product.php';

class ProductController {
    public function getProducts() {
        return Product::getAllProducts();
    }

    public function getAllProducts() {
        return Product::getAllProducts();
    }

    public function getProductById($id) {
        return Product::getProductById($id);
    }

    public function createProduct($data) {
        return Product::createProduct($data);
    }

    public function updateProduct($id, $data) {
        return Product::updateProduct($id, $data);
    }

    public function deleteProduct($id) {
        return Product::deleteProduct($id);
    }
}
?>