<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Product.php";

require_role('admin');

$products = Product::all();
$featured_count = count(Product::featured());

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/admin/products.php";
