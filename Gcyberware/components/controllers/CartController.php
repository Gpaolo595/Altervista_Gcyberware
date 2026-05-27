<?php

class CartController {

    public static function add($product_id) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = 1;
        } else {
            $_SESSION['cart'][$product_id]++;
        }
    }

    public static function remove($product_id) {
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
    }

    public static function getCart() {
        return $_SESSION['cart'] ?? [];
    }

    public static function clear() {
        unset($_SESSION['cart']);
    }
}
