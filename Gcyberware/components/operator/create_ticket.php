<?php
function create_ticket($session_id, $text) {
    global $DB;

    $user = current_user();
    $user_id = $user ? $user['id'] : null;

    $stmt = $DB->prepare("
        INSERT INTO support_tickets (session_id, user_id, message)
        VALUES (?, ?, ?)
    ");
    $stmt->bind_param("sis", $session_id, $user_id, $text);
    $stmt->execute();

    return "La tua richiesta richiede un operatore umano. Un membro del team ti contatterà a breve.";
}

?>
