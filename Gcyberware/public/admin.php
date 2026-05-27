<?php
require_once __DIR__ . "/../components/config/app.php";
require_role('admin');

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/admin/dashboard.php";
