<?php

require_once COMPONENTS_PATH . "/models/Order.php";
require_once COMPONENTS_PATH . "/models/OrderItem.php";
require_once COMPONENTS_PATH . "/models/Product.php";

class OrderController {

    public static function getUserOrders($user_id) {
    return Order::findByUser($user_id);
}

    public static function checkout($user_id) {
        $cart = CartController::getCart();
        if (empty($cart)) return false;

        $total = 0;

        foreach ($cart as $product_id => $qty) {
            $product = Product::find($product_id);
            $total += $product['price'] * $qty;
        }

        $order_id = Order::create($user_id, $total);

        foreach ($cart as $product_id => $qty) {
            $product = Product::find($product_id);
            OrderItem::add($order_id, $product_id, $qty, $product['price']);
        }

        CartController::clear();

        return $order_id;
    }
}
