<?php
function classify_request($text) {
    $messages = [
        ["role" => "system", "content" => "Rispondi SOLO con BOT o OPERATORE."],
        ["role" => "user", "content" => $text]
    ];

    $res = groq_chat($messages);
    return trim($res["choices"][0]["message"]["content"]);
}
?>
