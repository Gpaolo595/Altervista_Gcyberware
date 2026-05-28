<?php

class Product {

    public static function all() {
        global $DB;
        $res = $DB->query("SELECT * FROM products ORDER BY id DESC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        global $DB;
        $stmt = $DB->prepare("SELECT * FROM products WHERE id=? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($name, $category_id, $price, $stock, $description, $image) {
    global $DB;
    $stmt = $DB->prepare("
        INSERT INTO products (name, category_id, price, stock, description, image)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("sidiss", $name, $category_id, $price, $stock, $description, $image);
    return $stmt->execute();
}

public static function update($id, $name, $category_id, $price, $stock, $description, $image) {
    global $DB;
    $stmt = $DB->prepare("
        UPDATE products
        SET name=?, category_id=?, price=?, stock=?, description=?, image=?
        WHERE id=?
    ");
    $stmt->bind_param("sidissi", $name, $category_id, $price, $stock, $description, $image, $id);
    return $stmt->execute();
}

    public static function delete($id) {

    $product = Product::find($id);

    $uploadDir = __DIR__ . "/../../public/uploads/";
    if (!empty($product['image']) && file_exists($uploadDir . $product['image'])) {
        unlink($uploadDir . $product['image']);
    }

    Product::delete($id);

    header("Location: /Gcyberware/public/products.php");
    exit;
 }

    public static function featured() {
        global $DB;
        $res = $DB->query("SELECT * FROM products WHERE featured = 1 ORDER BY id DESC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function toggleFeatured($product_id, $featured) {
        global $DB;
        $stmt = $DB->prepare("UPDATE products SET featured = ? WHERE id = ?");
        $stmt->bind_param("ii", $featured, $product_id);
        return $stmt->execute();
    }

    public static function decrementStock($product_id, $quantity) {
        global $DB;
        $stmt = $DB->prepare("UPDATE products SET stock = stock - ? WHERE id = ? AND stock >= ?");
        $stmt->bind_param("iii", $quantity, $product_id, $quantity);
        return $stmt->execute();
    }

    public static function isInStock($product_id, $quantity = 1) {
        global $DB;
        $stmt = $DB->prepare("SELECT stock FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result && $result['stock'] >= $quantity;
    }

    public static function getStock($product_id) {
        global $DB;
        $stmt = $DB->prepare("SELECT stock FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result ? $result['stock'] : 0;
    }
}
