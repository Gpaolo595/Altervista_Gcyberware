<?php

require_once COMPONENTS_PATH . "/models/Ticket.php";
require_once COMPONENTS_PATH . "/models/User.php";

class UserDashboardController {

    public static function getUserTickets($user_id, $session_id) {
        global $DB;

        // Ticket legati all'utente loggato O alla sessione anonima
        $stmt = $DB->prepare("
            SELECT * FROM support_tickets
            WHERE (user_id = ? OR session_id = ?)
            ORDER BY created_at DESC
            LIMIT 5
        ");
        $stmt->bind_param("is", $user_id, $session_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function getLastChatMessages($user_id) {
    global $DB;

    $stmt = $DB->prepare("
        SELECT role, content, created_at
        FROM chat_messages
        WHERE user_id = ?
        ORDER BY id DESC
        LIMIT 5
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
 }
}
