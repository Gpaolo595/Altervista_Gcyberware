<?php
require_once __DIR__ . "/../components/config/app.php";
require_role('admin');
require_once COMPONENTS_PATH . "/controllers/AdminController.php";

$users = AdminController::listUsers();

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/admin/users.php";
