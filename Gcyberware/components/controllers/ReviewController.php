<?php

require_once COMPONENTS_PATH . "/models/Review.php";

class ReviewController {

    public static function add($product_id, $user_id) {
        $rating = intval($_POST['rating']);
        $comment = $_POST['comment'];

        Review::create($product_id, $user_id, $rating, $comment);

        header("Location: /Gcyberware/public/product.php?id=$product_id");
        exit;
    }

    public static function edit($review_id, $product_id) {
        $rating = intval($_POST['rating']);
        $comment = $_POST['comment'];

        Review::update($review_id, $rating, $comment);

        header("Location: /Gcyberware/public/product.php?id=$product_id");
        exit;
    }

    public static function delete($review_id, $product_id) {
        Review::delete($review_id);

        header("Location: /Gcyberware/public/product.php?id=$product_id");
        exit;
    }
}
