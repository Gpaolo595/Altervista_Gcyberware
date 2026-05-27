<?php
function groq_chat($messages, $model = "llama-3.1-8b-instant") {
    global $GROQ_API_KEY, $GROQ_ENDPOINT;

    $payload = json_encode([
        "model" => $model,
        "messages" => $messages,
        "temperature" => 0.3,
        "max_tokens" => 512
    ]);

    $ch = curl_init($GROQ_ENDPOINT);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $GROQ_API_KEY",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

    $response = curl_exec($ch);

if ($response === false) {
    return ["error" => curl_error($ch)];
}

curl_close($ch);

// DEBUG TEMPORANEO
return ["raw" => $response];
}
?>
