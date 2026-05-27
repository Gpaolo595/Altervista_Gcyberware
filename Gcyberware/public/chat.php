<?php
session_start();

$remote = "https://bot-render-wsyu.onrender.com"; 

$msg = $_POST["msg"] ?? "";

if (trim($msg) === "") {
    echo json_encode(["reply" => ""]);
    exit;
}

$ch = curl_init($remote);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, ["msg" => $msg]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo json_encode(["reply" => "Errore di connessione al bot remoto"]);
    exit;
}

echo $response;
