<?php
    include 'db.php';

    session_start();
    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $idTracciamento = $_GET["idTracciamento"];
    $query = $conn->prepare(
        "SELECT tblCitazioni.* 
        FROM tblCitazioni
        INNER JOIN tblTracciamenti ON tblCitazioni.tracciamentoId = tblTracciamenti.idTracciamento
        WHERE tblTracciamenti.idTracciamento = ?
        ORDER BY tblCitazioni.pagina
    ");
    $query->bind_param("i", $idTracciamento);
    $query->execute();
    $result = $query->get_result();
    $citazioni = $result->fetch_all(MYSQLI_ASSOC);
    $query->close();
?>