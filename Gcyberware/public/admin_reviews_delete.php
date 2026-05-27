<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Review.php";

require_role('admin');

$review_id = intval($_GET['id'] ?? 0);

$stmt = $GLOBALS['DB']->prepare("SELECT * FROM reviews WHERE id=? LIMIT 1");
$stmt->bind_param("i", $review_id);
$stmt->execute();
$result = $stmt->get_result();
$review = $result->fetch_assoc();

if ($review) {
    Review::delete($review_id);
}

header("Location: /Gcyberware/public/admin_reviews.php");
exit;
