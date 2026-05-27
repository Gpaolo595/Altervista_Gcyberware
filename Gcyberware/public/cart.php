<?php
require_once __DIR__ . "/../components/config/app.php";
require_role('user');

require_once COMPONENTS_PATH . "/models/Product.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$cart = $_SESSION['cart'] ?? [];

$products = [];
$total = 0;

foreach ($cart as $product_id => $qty) {
    $p = Product::find($product_id);
    if ($p) {
        $p['qty'] = $qty;
        $p['subtotal'] = $qty * $p['price'];
        $total += $p['subtotal'];
        $products[] = $p;
    }
}

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/cart/index.php";
