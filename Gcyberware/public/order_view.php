<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Order.php";
require_once COMPONENTS_PATH . "/models/OrderItem.php";
require_once COMPONENTS_PATH . "/models/Review.php";

require_role('user');

$user = current_user();
$order_id = intval($_GET['id'] ?? 0);
$order = Order::find($order_id);

if (!$order || $order['user_id'] != $user['id']) {
    header("Location: /Gcyberware/public/orders.php");
    exit;
}

$items = OrderItem::findByOrder($order_id);

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/orders/view.php";
