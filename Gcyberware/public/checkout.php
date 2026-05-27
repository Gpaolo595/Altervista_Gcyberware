<?php
require_once __DIR__ . "/../components/config/app.php";

$user = current_user();
if (!$user) {
    header("Location: /Gcyberware/public/login.php");
    exit;
}

$order_id = OrderController::checkout($user['id']);

if (!$order_id) {
    echo "Errore durante il checkout.";
    exit;
}

header("Location: /Gcyberware/public/order_view.php?id=$order_id");
exit;
