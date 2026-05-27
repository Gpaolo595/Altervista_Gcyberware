<?php
require_once __DIR__ . "/build_prompt.php";

function handle_message($session_id, $user_text) {
    save_message($session_id, "user", $user_text);

    $history = get_history($session_id);

    $products = search_products($user_text);

    $messages = build_prompt($history, $products);

    $response = groq_chat($messages);
    $reply = $response["choices"][0]["message"]["content"];

    save_message($session_id, "assistant", $reply);

    return $reply;
}
?>
