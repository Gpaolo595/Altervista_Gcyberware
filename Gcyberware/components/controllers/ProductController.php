<?php

require_once COMPONENTS_PATH . "/models/Product.php";

class ProductController {

    public static function create() {
    $name = $_POST['name'];
    $category_id = intval($_POST['category_id']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);
    $description = $_POST['description'];

    $imageName = null;

    if (!empty($_FILES['image']['name'])) {
        $uploadDir = __DIR__ . "/../../public/uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $imageName;

        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
    }

    if (Product::create($name, $category_id, $price, $stock, $description, $imageName)) {
        header("Location: /Gcyberware/public/products.php");
        exit;
    }

    return "Errore durante la creazione del prodotto.";
}


public static function update($id) {
    $name = $_POST['name'];
    $category_id = intval($_POST['category_id']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);
    $description = $_POST['description'];

    
    $product = Product::find($id);
    $oldImage = $product['image'];

    $newImage = $oldImage; 

    
    if (!empty($_FILES['image']['name'])) {

        $uploadDir = __DIR__ . "/../../public/uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $newImage = time() . "_" . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $newImage;

        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);

        
        if (!empty($oldImage) && file_exists($uploadDir . $oldImage)) {
            unlink($uploadDir . $oldImage);
        }
    }

    if (Product::update($id, $name, $category_id, $price, $stock, $description, $newImage)) {
        header("Location: /Gcyberware/public/products.php");
        exit;
    }

    return "Errore durante l'aggiornamento.";
}


    public static function delete($id) {
        Product::delete($id);
        header("Location: /Gcyberware/public/products.php");
        exit;
    }
}
