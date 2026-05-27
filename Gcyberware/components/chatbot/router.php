<?php
function route_message($session_id, $user_text) {
    $classification = classify_request($user_text);

    if ($classification === "OPERATORE") {
        require_once __DIR__ . "/../operator/create_ticket.php";
        return create_ticket($session_id, $user_text);
    }

    require_once __DIR__ . "/handle_message.php";
    return handle_message($session_id, $user_text);
}
?>
