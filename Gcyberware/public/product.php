<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Product.php";
require_once COMPONENTS_PATH . "/models/Review.php";

$product_id = intval($_GET['id'] ?? 0);
$product = Product::find($product_id);

if (!$product) {
    header("Location: /Gcyberware/public/shop.php");
    exit;
}

$reviews = Review::findByProduct($product_id);
$avg_rating = Review::averageRating($product_id);
$user = current_user();
$user_review = null;

if ($user) {
    $user_review = Review::findUserReview($product_id, $user['id']);
}

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/products/detail.php";
