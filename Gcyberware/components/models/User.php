<?php

class User {

    public static function findByUsername($username) {
        global $DB;
        $stmt = $DB->prepare("SELECT * FROM users WHERE username=? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function findById($id) {
        global $DB;
        $stmt = $DB->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($username, $password, $email) {
        global $DB;

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $DB->prepare("
            INSERT INTO users (username, password_hash, email)
            VALUES (?, ?, ?)
        ");

        if (!$stmt) {
            die("Errore prepare(): " . $DB->error);
        }

        $stmt->bind_param("sss", $username, $hash, $email);

        return $stmt->execute();
    }
}
