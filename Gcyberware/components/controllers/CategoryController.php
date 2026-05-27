<?php

require_once COMPONENTS_PATH . "/models/Category.php";

class CategoryController {

    public static function create() {
        $name = $_POST['name'];

        if (Category::create($name)) {
            header("Location: /Gcyberware/public/categories.php");
            exit;
        }

        return "Errore durante la creazione della categoria.";
    }

    public static function update($id) {
        $name = $_POST['name'];

        if (Category::update($id, $name)) {
            header("Location: /Gcyberware/public/categories.php");
            exit;
        }

        return "Errore durante l'aggiornamento.";
    }

    public static function delete($id) {
        Category::delete($id);
        header("Location: /Gcyberware/public/categories.php");
        exit;
    }
}
