<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Product.php";

require_role('admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id'] ?? 0);
    $featured = intval($_POST['featured'] ?? 0);
    
    if ($product_id > 0) {
        Product::toggleFeatured($product_id, $featured);
    }
    
    header("Location: /Gcyberware/public/admin_featured.php");
    exit;
}

$all_products = Product::all();
$featured_products = Product::featured();

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/admin/featured.php";
