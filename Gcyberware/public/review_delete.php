<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Review.php";
require_once COMPONENTS_PATH . "/controllers/ReviewController.php";

require_login();

$user = current_user();
$review_id = intval($_GET['id'] ?? 0);
$product_id = intval($_GET['product'] ?? 0);

$review = null;
$stmt = $GLOBALS['DB']->prepare("SELECT * FROM reviews WHERE id=? LIMIT 1");
$stmt->bind_param("i", $review_id);
$stmt->execute();
$result = $stmt->get_result();
$review = $result->fetch_assoc();

if (!$review || $review['user_id'] != $user['id']) {
    header("Location: /Gcyberware/public/product.php?id=$product_id");
    exit;
}

ReviewController::delete($review_id, $product_id);
