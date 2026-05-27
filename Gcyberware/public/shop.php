<?php
require_once __DIR__ . "/../components/config/app.php";

require_once COMPONENTS_PATH . "/controllers/ProductController.php";

$products = Product::all();

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/products/shop.php";
