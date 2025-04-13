<?php
    require 'db.php';

    session_start();

    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        die("Errore: richiesta non valida.");
    }

    $idTracciamento = $_POST['idTracciamento'];
    $dataInizio = empty($_POST['dataInizio']) ? null : $_POST['dataInizio'];
    $dataFine   = empty($_POST['dataFine']) ? null : $_POST['dataFine'];
    $voto = $_POST['voto'];
    $stato = $_POST['stato-lettura'];
    $recensione = trim($_POST['recensione']);

    if ($stato == '1') { // In lettura
        if ($dataFine !== null) {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'In lettura: la data di fine non deve essere presente.'];
            header("Location: ../pages/libro.php?idTracciamento=$idTracciamento");
            exit();
        }
        if ($dataInizio === null) {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'In lettura: la data di inizio è obbligatoria.'];
            header("Location: ../pages/libro.php?idTracciamento=$idTracciamento");
            exit();
        }
    } elseif ($stato == '3') { // Completato
        if ($dataInizio === null || $dataFine === null) {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Completato: servono entrambe le date.'];
            header("Location: ../pages/libro.php?idTracciamento=$idTracciamento");
            exit();
        }
        if (strtotime($dataInizio) > strtotime($dataFine)) {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'La data di inizio non può essere successiva a quella di fine.'];
            header("Location: ../pages/libro.php?idTracciamento=$idTracciamento");
            exit();
        }
    } elseif ($stato == '2') { // Da leggere
        if ($dataInizio !== null || $dataFine !== null) {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Da leggere: le date devono essere vuote.'];
            header("Location: ../pages/libro.php?idTracciamento=$idTracciamento");
            exit();
        }
    }

    $query = $conn->prepare("UPDATE tblTracciamenti 
        SET dataInizio = ?, dataFine = ?, voto = ?, stato = ?, recensione = ? 
        WHERE idTracciamento = ?");
        
    $dataInizio_bind = $dataInizio ?? NULL;
    $dataFine_bind   = $dataFine ?? NULL;

    $query->bind_param("sssssi", $dataInizio_bind, $dataFine_bind, $voto, $stato, $recensione, $idTracciamento);

    if ($query->execute()) {
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'Modifica andata a buon fine!'];
        header("Location: ../pages/libro.php?idTracciamento=$idTracciamento");
        exit();
    } else {
        die("Errore nella query: " . $query->error);
    }
?>
