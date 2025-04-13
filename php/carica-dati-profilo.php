<?php
    include 'db.php';

    session_start();
    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $idUtente = $_SESSION['idUtente'];
    $query = $conn->prepare("SELECT nome, cognome, email FROM tblUtenti WHERE idUtente = ?");
    $query->bind_param("i", $idUtente);
    $query->execute();
    $result = $query->get_result();
    $utente = $result->fetch_assoc();
    $query->close();
?>