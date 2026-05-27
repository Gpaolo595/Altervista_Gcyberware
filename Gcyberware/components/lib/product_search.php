<?php
function search_products($query) {
    global $DB;

    $stmt = $DB->prepare("
        SELECT id, name, price, description 
        FROM products 
        WHERE name LIKE CONCAT('%', ?, '%') 
        LIMIT 10
    ");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>
