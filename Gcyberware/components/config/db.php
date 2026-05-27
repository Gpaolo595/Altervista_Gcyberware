<?php
$DB = new mysqli(
    "localhost",
    "cybers",
    "password",
    "my_cybers"
);

if ($DB->connect_error) {
    die("Errore DB: " . $DB->connect_error);
}
?>
