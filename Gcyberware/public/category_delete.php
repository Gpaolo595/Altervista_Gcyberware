<?php
require_once __DIR__ . "/../components/config/app.php";
require_role('admin');
require_once COMPONENTS_PATH . "/controllers/CategoryController.php";

$id = $_GET['id'];
CategoryController::delete($id);
