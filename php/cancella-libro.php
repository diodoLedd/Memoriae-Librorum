<?php
    include 'db.php';
    
    session_start();

    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $idTracciamento = intval($_POST['idTracciamento']);

    $query1 = $conn->prepare("DELETE FROM tblCitazioni WHERE tracciamentoId = ?");
    $query1->bind_param("i", $idTracciamento);
    $query1->execute();
    $query1->close();

    $query2 = $conn->prepare("DELETE FROM tblTracciamenti WHERE idTracciamento = ?");
    $query2->bind_param("i", $idTracciamento);
    $query2->execute();
    $query2->close();

    header("Location: ../pages/dashboard.php");
    exit();
?>
