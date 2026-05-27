<?php

require_once COMPONENTS_PATH . "/lib/auth.php";
require_once COMPONENTS_PATH . "/models/User.php";

class AuthController {

    public static function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (login($username, $password)) {
            header("Location: /Gcyberware/public/index.php");
            exit;
        }

        return "Credenziali non valide.";
    }

  public static function register() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    if (User::create($username, $password, $email)) {
        header("Location: /Gcyberware/public/login.php");
        exit;
    }

    return "Errore durante la registrazione.";
}
}
