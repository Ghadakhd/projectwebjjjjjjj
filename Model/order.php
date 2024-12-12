<?php
require_once '../config.php';

class Order {
    public static function createOrder($userId, $totalAmount, $cartItems) {
        $db = Database::getConnection();
        $query = $db->prepare("INSERT INTO `Order` (UserID, TotalAmount, CartItems) VALUES (?, ?, ?)");
        $query->execute([$userId, $totalAmount, json_encode($cartItems)]);
        return $db->lastInsertId();
    }
}
?>
