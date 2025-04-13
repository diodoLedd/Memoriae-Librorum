<?php
    include 'db.php';

    session_start();
    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $idTracciamento = $_GET["idTracciamento"];
    $query = $conn->prepare(
        "SELECT tblTracciamenti.*, tblLibri.*, tblGeneri.nome AS nomeGenere, tblAutori.nome AS nomeAutore, tblAutori.cognome AS cognomeAutore
        FROM tblTracciamenti
        INNER JOIN tblLibri ON tblTracciamenti.libroId = tblLibri.idLibro
        INNER JOIN tblAutori ON tblLibri.autoreId = tblAutori.idAutore
        INNER JOIN tblGeneri ON tblLibri.genereId = tblGeneri.idGenere
        WHERE tblTracciamenti.idTracciamento = ?
        ");
    $query->bind_param("i", $idTracciamento);
    $query->execute();
    $result = $query->get_result();
    $tracciamenti = $result->fetch_assoc(); 
    $query->close();
?>