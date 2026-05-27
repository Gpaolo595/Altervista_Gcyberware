<?php

class Review {

    public static function findByProduct($product_id) {
        global $DB;
        $stmt = $DB->prepare("
            SELECT r.*, u.username
            FROM reviews r
            JOIN users u ON u.id = r.user_id
            WHERE product_id=?
            ORDER BY created_at DESC
        ");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function findUserReview($product_id, $user_id) {
        global $DB;
        $stmt = $DB->prepare("
            SELECT * FROM reviews
            WHERE product_id=? AND user_id=?
            LIMIT 1
        ");
        $stmt->bind_param("ii", $product_id, $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($product_id, $user_id, $rating, $comment) {
        global $DB;
        $stmt = $DB->prepare("
            INSERT INTO reviews (product_id, user_id, rating, comment)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("iiis", $product_id, $user_id, $rating, $comment);
        return $stmt->execute();
    }

    public static function update($id, $rating, $comment) {
        global $DB;
        $stmt = $DB->prepare("
            UPDATE reviews SET rating=?, comment=? WHERE id=?
        ");
        $stmt->bind_param("isi", $rating, $comment, $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $DB;
        $stmt = $DB->prepare("DELETE FROM reviews WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function averageRating($product_id) {
        global $DB;
        $stmt = $DB->prepare("
            SELECT AVG(rating) AS avg_rating
            FROM reviews
            WHERE product_id=?
        ");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['avg_rating'];
    }
}
