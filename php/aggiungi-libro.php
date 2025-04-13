<?php
    include 'db.php';

    session_start();

    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idLibro'])) {
        $idUtente = $_SESSION['idUtente'];
        $idLibro = $_POST['idLibro'];
        $richiesta = $_POST['richiesta'];
        $stato = 2;

        $query1 = $conn->prepare("SELECT COUNT(*) FROM tblTracciamenti WHERE utenteId = ? AND libroId = ?");
        $query1->bind_param("ii", $idUtente, $idLibro);
        $query1->execute();
        $query1->bind_result($contatore);
        $query1->fetch();
        $query1->close();

        if ($contatore == 0) {
            $query2 = $conn->prepare("INSERT INTO tblTracciamenti (utenteId, libroId, stato) VALUES (?, ?, ?)");
            $query2->bind_param("iis", $idUtente, $idLibro, $stato);
            
            if ($query2->execute()) {
                $_SESSION['alert'] = ['type' => 'success', 'message' => 'Libro aggiunto alla tua libreria!'];
            } else {
                $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Errore durante l\'aggiunta del libro.'];
            }
            $query2->close();
            header("Location: ../pages/risultati.php?query=" . urlencode($richiesta));
            exit();
        } else {
            $_SESSION['alert'] = ['type' => 'warning', 'message' => 'Questo libro è già nella tua lista.'];
            header("Location: ../pages/risultati.php?query=" . urlencode($richiesta));
            exit();
        }
    }
?>