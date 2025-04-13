<?php
    include 'db.php';
    session_start();

    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $pagina = isset($_POST['pagina']) ? intval($_POST['pagina']) : null;
    $testo = isset($_POST['testo']) ? trim($_POST['testo']) : null;
    $idTracciamento = isset($_POST['idTracciamento']) ? intval($_POST['idTracciamento']) : null;

    $query = $conn->prepare("INSERT INTO tblCitazioni (pagina, testo, tracciamentoId) VALUES (?, ?, ?)");
    $query->bind_param("isi", $pagina, $testo, $idTracciamento);

    if ($query->execute()) {
        header("Location: ../pages/libro.php?idTracciamento=" . $idTracciamento."#citazioni");
        exit();
    } else {
        die("Errore nell'inserimento citazione: " . $query->error);
    }

?>
