<?php
require 'db.php'; 
session_start(); // Avvia la sessione per usare le variabili $_SESSION

// Controllo se l'utente è loggato
if(!isset($_SESSION['user_id'])){
    header("Location: loginaction.php"); // Se l'utente non ha fatto login, lo reindirizza alla pagina di login
    exit; // Ferma l'esecuzione dello script dopo il redirect
}

// Gestione eliminazione account
if(isset($_POST['delete'])){ // Controlla se il form di cancellazione account è stato inviato
    $id = $_SESSION['user_id']; // Prende l'ID dell'utente loggato dalla sessione

    // Prepara la query SQL per cancellare l'utente dal database
    $sql = "DELETE FROM `002UTENTI` WHERE ID=?";
    $stmt = $conn->prepare($sql); // Prepara la query
    $stmt->bind_param("i", $id); // Associa l'ID come parametro della query
    $stmt->execute(); // Esegue la query

    session_destroy(); // Distrugge tutte le variabili di sessione, logout automatico
    header("Location: loginaction.php"); // Reindirizza l'utente alla pagina di login
    exit; // Ferma l'esecuzione dello script dopo il redirect
}
?>

<html>
<head>
<title>Dashboard</title>
</head>
<body>

<h2>Benvenuto nel mio sito! <?php echo $_SESSION['username']; ?></h2>

<!-- Bottone per aggiornare l'account -->
<form method="GET" action="update.php">
    <!-- Invia l'utente alla pagina update.php dove può modificare username, email e password -->
    <button type="submit">Aggiorna account</button>
</form>

<!-- Bottone per cancellare l'account -->
<form method="POST" action="dashboard.php">
    <!-- Questo form invia una richiesta POST alla stessa pagina per eliminare l'account -->
    <button type="submit" name="delete">Cancella account</button>
</form>

<!-- Bottone per tornare alla dashboard -->
<button type="button" onclick="window.location.href='dashboard.php'">
    <!-- Questo è un pulsante normale, non submit, che ricarica semplicemente la dashboard -->
    Torna alla dashboard
</button>

</body>
</html>