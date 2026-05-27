<?php
require_once __DIR__ . "/../components/config/app.php";
require_role('user');

require_once COMPONENTS_PATH . "/controllers/OrderController.php";

$user = current_user();
if (!$user) {
    header("Location: /Gcyberware/public/login.php");
    exit;
}

$user_id = $user['id'];
$orders = OrderController::getUserOrders($user_id);

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/orders/list.php";
