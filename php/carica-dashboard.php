<?php
    include '../php/db.php';
    session_start();
    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $idUtente = $_SESSION['idUtente'];
    $query = $conn->prepare(
        "SELECT tblTracciamenti.*, tblLibri.titolo, tblAutori.nome, tblAutori.cognome 
        FROM tblTracciamenti 
        INNER JOIN tblLibri ON tblTracciamenti.libroId = tblLibri.idLibro 
        INNER JOIN tblAutori ON tblLibri.autoreId = tblAutori.idAutore 
        WHERE tblTracciamenti.utenteId = ?"
    );
    $query->bind_param("i", $idUtente);
    $query->execute();
    $result = $query->get_result();
    $tracciamenti = $result->fetch_all(MYSQLI_ASSOC);
    $query->close();

    $daLeggere = array_filter($tracciamenti, fn($t) => $t['stato'] == '2');
    $inLettura = array_filter($tracciamenti, fn($t) => $t['stato'] == '1');
    $letti = array_filter($tracciamenti, fn($t) => $t['stato'] == '3');
?>
