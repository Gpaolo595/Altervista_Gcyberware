<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Product.php";
require_once COMPONENTS_PATH . "/models/Review.php";

$user = current_user();
if (!$user) {
    header("Location: /Gcyberware/public/login.php");
    exit;
}

$product_id = intval($_GET['product'] ?? 0);
$product = Product::find($product_id);

if (!$product) {
    header("Location: /Gcyberware/public/shop.php");
    exit;
}

$user_review = Review::findUserReview($product_id, $user['id']);
if ($user_review) {
    header("Location: /Gcyberware/public/product.php?id=$product_id");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ReviewController::add($product_id, $user['id']);
}

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/reviews/form.php";
