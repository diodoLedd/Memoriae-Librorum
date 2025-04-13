<?php
    require 'db.php';
    session_start();

    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $idUtente = $_SESSION['idUtente'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = trim($_POST['password']);

        $query = $conn->prepare("SELECT passwordHash FROM tblUtenti WHERE idUtente = ?");
        $query->bind_param("i", $idUtente);
        $query->execute();
        $query->bind_result($passwordHash);
        $query->fetch();
        $query->close();

        if (!password_verify($password, $passwordHash)) {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Password errata. Operazione annullata.'];
            header("Location: ../pages/profilo.php");
            exit();
        }

        $conn->query("DELETE FROM tblCitazioni WHERE tracciamentoId IN (SELECT idTracciamento FROM tblTracciamenti WHERE utenteId = $idUtente)");

        $conn->query("DELETE FROM tblTracciamenti WHERE utenteId = $idUtente");

        $conn->query("DELETE FROM tblUtenti WHERE idUtente = $idUtente");

        session_unset();
        session_destroy();
        session_start();
        $_SESSION['alert'] = ['type' => 'warning', 'message' => 'Account eliminato correttamente. Ci dispiace della tua scelta.'];
        header("Location: ../pages/accedi.php");
        exit();
    }
?>