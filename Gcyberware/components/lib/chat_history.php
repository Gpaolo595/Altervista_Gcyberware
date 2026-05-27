<?php
function save_message($session_id, $role, $content) {
    global $DB;

    $user = current_user();
    $user_id = $user ? $user['id'] : null;

    $stmt = $DB->prepare("
        INSERT INTO chat_messages (session_id, user_id, role, content)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("siss", $session_id, $user_id, $role, $content);
    $stmt->execute();
}


function get_history($session_id, $limit = 20) {
    global $DB;
    $stmt = $DB->prepare("SELECT role, content FROM chat_messages WHERE session_id=? ORDER BY id DESC LIMIT ?");
    $stmt->bind_param("si", $session_id, $limit);
    $stmt->execute();
    $res = $stmt->get_result();

    $messages = [];
    while ($row = $res->fetch_assoc()) {
        $messages[] = [
            "role" => $row["role"],
            "content" => $row["content"]
        ];
    }
    return array_reverse($messages);
}
?>
