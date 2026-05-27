<?php

require_once COMPONENTS_PATH . "/models/User.php";

class AdminController {

    public static function listUsers() {
        global $DB;
        $res = $DB->query("SELECT * FROM users ORDER BY id DESC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function updateUserRole($id, $role) {
        global $DB;
        $stmt = $DB->prepare("UPDATE users SET role=? WHERE id=?");
        $stmt->bind_param("si", $role, $id);
        return $stmt->execute();
    }

    public static function getUser($id) {
        return User::findById($id);
    }
}
