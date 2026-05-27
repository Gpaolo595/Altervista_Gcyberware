<?php
require_once __DIR__ . "/../components/config/app.php";
require_role('admin');

require_once COMPONENTS_PATH . "/controllers/CategoryController.php";

$categories = Category::all();

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/categories/list.php";
