<?php

class Order {

    public static function create($user_id, $total) {
        global $DB;
        $stmt = $DB->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
        $stmt->bind_param("id", $user_id, $total);
        $stmt->execute();
        return $DB->insert_id;
    }

    public static function findByUser($user_id) {
        global $DB;
        $stmt = $DB->prepare("SELECT * FROM orders WHERE user_id=? ORDER BY id DESC");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $DB;
        $stmt = $DB->prepare("SELECT * FROM orders WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function updateShippingAndPayment($order_id, $shipping_data, $payment_method, $notes = "") {
        global $DB;
        $stmt = $DB->prepare("
            UPDATE orders 
            SET shipping_name=?, shipping_address=?, shipping_city=?, shipping_postal=?, shipping_country=?, 
                payment_method=?, notes=?, status='confirmed'
            WHERE id=?
        ");
        $stmt->bind_param(
            "sssssssi",
            $shipping_data['name'],
            $shipping_data['address'],
            $shipping_data['city'],
            $shipping_data['postal'],
            $shipping_data['country'],
            $payment_method,
            $notes,
            $order_id
        );
        return $stmt->execute();
    }

    public static function getTotal($order_id) {
        global $DB;
        $stmt = $DB->prepare("SELECT total FROM orders WHERE id=? LIMIT 1");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result ? $result['total'] : 0;
    }
}
