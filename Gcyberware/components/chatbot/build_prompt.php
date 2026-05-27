<?php
function build_prompt($history, $products = []) {

    $user = current_user();

    $user_context = "";
    if ($user) {
        $user_context = "UTENTE LOGGATO:
        - ID: {$user['id']}
        - Username: {$user['username']}
        - Ruolo: {$user['role']}
        ";
    }

    $product_context = "";
    if (!empty($products)) {
        $product_context .= "PRODOTTI DISPONIBILI:\n";
        foreach ($products as $p) {
            $product_context .= "- ID {$p['id']}: {$p['name']} ({$p['price']}€)\n";
        }
    }

    $messages = [
        [
            "role" => "system",
            "content" => "Sei l'assistente dell'e-commerce Gcyberware. 
            Se l'utente è loggato, usa le sue informazioni per personalizzare l'assistenza.
            Non inventare mai dati."
        ]
    ];

    if ($user_context) {
        $messages[] = ["role" => "system", "content" => $user_context];
    }

    foreach ($history as $msg) {
        $messages[] = $msg;
    }

    if ($product_context) {
        $messages[] = ["role" => "system", "content" => $product_context];
    }

    return $messages;
}


?>
