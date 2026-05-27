<?php

class Category {

    public static function all() {
        global $DB;
        $res = $DB->query("SELECT * FROM categories ORDER BY name ASC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $DB;
        $stmt = $DB->prepare("SELECT * FROM categories WHERE id=? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($name) {
        global $DB;
        $stmt = $DB->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }

    public static function update($id, $name) {
        global $DB;
        $stmt = $DB->prepare("UPDATE categories SET name=? WHERE id=?");
        $stmt->bind_param("si", $name, $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $DB;
        $stmt = $DB->prepare("DELETE FROM categories WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
