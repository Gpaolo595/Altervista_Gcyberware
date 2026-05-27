<?php

class OrderItem {

    public static function add($order_id, $product_id, $quantity, $price) {
        global $DB;
        $stmt = $DB->prepare("
            INSERT INTO order_items (order_id, product_id, quantity, price)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $price);
        return $stmt->execute();
    }

    public static function findByOrder($order_id) {
        global $DB;
        $stmt = $DB->prepare("
            SELECT oi.*, p.name 
            FROM order_items oi
            JOIN products p ON p.id = oi.product_id
            WHERE order_id=?
        ");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
