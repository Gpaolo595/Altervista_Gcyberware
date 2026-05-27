<?php
require_once __DIR__ . "/../components/config/app.php";
require_role('admin');
require_once COMPONENTS_PATH . "/controllers/CategoryController.php";

$id = $_GET['id'];
$category = Category::find($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = CategoryController::update($id);
}

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/categories/edit.php";

if (isset($error)) echo "<p style='color:red'>$error</p>";
