<?php

function current_user() {
    if (!isset($_SESSION['user_id'])) return null;

    global $DB;
    $stmt = $DB->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function login($username, $password) {
    global $DB;

    $stmt = $DB->prepare("SELECT * FROM users WHERE username=? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if (!$user) return false;
    if (!password_verify($password, $user['password_hash'])) return false;

    $_SESSION['user_id'] = $user['id'];
    return true;
}

function register_user($username, $password, $email) {
    global $DB;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $DB->prepare("INSERT INTO users (username, password_hash, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hash, $email);
    return $stmt->execute();
}

function logout() {
    session_destroy();
}

function require_role($role) {
    $user = current_user();
    if (!$user || $user['role'] !== $role) {
        header("Location: /Gcyberware/public/login.php");
        exit;
    }
}
