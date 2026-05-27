<?php
require_once __DIR__ . "/../components/config/app.php";
require_role('admin');
require_once COMPONENTS_PATH . "/controllers/AdminController.php";

$id = $_GET['id'];
$user = AdminController::getUser($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    AdminController::updateUserRole($id, $role);
    header("Location: /Gcyberware/public/admin_users.php");
    exit;
}

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/admin/edit_user.php";
