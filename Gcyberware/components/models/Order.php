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
}
