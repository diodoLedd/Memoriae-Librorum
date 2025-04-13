<?php
    include 'db.php';
    session_start();

    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $idCitazione = intval($_POST['idCitazione']);
    $idTracciamento = intval($_POST['idTracciamento']);

    $query = $conn->prepare("DELETE FROM tblCitazioni WHERE idCitazione = ?");
    $query->bind_param("i", $idCitazione);
    $query->execute();
    $query->close();

    header("Location: ../pages/libro.php?idTracciamento=" . $idTracciamento."#citazioni");
    exit();
?>
