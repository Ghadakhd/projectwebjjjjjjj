<?php
require_once '../Model/Product.php';
require_once '../Model/Order.php';

session_start();

class CartController {
    public function addToCart($productId, $quantity) {
        $products = Product::getAllProducts();
        $product = array_filter($products, fn($p) => $p['ProductID'] == $productId)[0] ?? null;

        if (!$product || $product['Stock'] < $quantity) {
            die("Product not available or insufficient stock.");
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'ProductID' => $product['ProductID'],
                'Name' => $product['Name'],
                'Price' => $product['Price'],
                'Image' => $product['Image'],
                'Type' => $product['Type'],
                'quantity' => $quantity
            ];
        }
    }

    public function getCart() {
        return $_SESSION['cart'] ?? [];
    }

    public function checkout($userId) {
        $cartItems = $this->getCart();
        $totalAmount = array_reduce($cartItems, fn($sum, $item) => $sum + ($item['Price'] * $item['quantity']), 0);
        Order::createOrder($userId, $totalAmount, $cartItems);
        unset($_SESSION['cart']);
    }
}
?>
