<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Product.php";
require_once COMPONENTS_PATH . "/models/Review.php";

$user = current_user();
if (!$user) {
    header("Location: /Gcyberware/public/login.php");
    exit;
}

$review_id = intval($_GET['id'] ?? 0);
$product_id = intval($_GET['product'] ?? 0);

$stmt = $GLOBALS['DB']->prepare("SELECT * FROM reviews WHERE id=? LIMIT 1");
$stmt->bind_param("i", $review_id);
$stmt->execute();
$result = $stmt->get_result();
$review = $result->fetch_assoc();

if (!$review || $review['user_id'] != $user['id']) {
    header("Location: /Gcyberware/public/product.php?id=$product_id");
    exit;
}

$product = Product::find($product_id);
if (!$product) {
    header("Location: /Gcyberware/public/shop.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ReviewController::edit($review_id, $product_id);
}

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/reviews/form_edit.php";
