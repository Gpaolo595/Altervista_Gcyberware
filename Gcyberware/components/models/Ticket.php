<?php

class Ticket {

    public static function allOpen() {
        global $DB;
        $res = $DB->query("
            SELECT * FROM support_tickets
            WHERE status='open' OR status='in_progress'
            ORDER BY created_at DESC
        ");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    
    public static function countOpen() {
    global $DB;
    $res = $DB->query("
        SELECT COUNT(*) AS total
        FROM support_tickets
        WHERE status='open' OR status='in_progress'
    ");
    return $res->fetch_assoc()['total'];
}


    public static function find($id) {
        global $DB;
        $stmt = $DB->prepare("SELECT * FROM support_tickets WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function addResponse($ticket_id, $operator_id, $response) {
        global $DB;
        $stmt = $DB->prepare("
            INSERT INTO operator_responses (ticket_id, operator_id, response)
            VALUES (?, ?, ?)
        ");
        $stmt->bind_param("iis", $ticket_id, $operator_id, $response);
        return $stmt->execute();
    }

    public static function close($id) {
        global $DB;
        $stmt = $DB->prepare("UPDATE support_tickets SET status='closed' WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function getResponses($ticket_id) {
        global $DB;
        $stmt = $DB->prepare("
            SELECT r.*, u.username AS operator_name
            FROM operator_responses r
            JOIN users u ON u.id = r.operator_id
            WHERE ticket_id=?
            ORDER BY created_at ASC
        ");
        $stmt->bind_param("i", $ticket_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
