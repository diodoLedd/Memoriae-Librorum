<?php
    include 'db.php';

    session_start();
    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["nome"], $_POST["cognome"], $_POST["email"])) {
        $idUtente = $_SESSION['idUtente'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $query = $conn->prepare("UPDATE tblUtenti SET nome = ?, cognome = ?, email = ? WHERE idUtente = ?");
        $query->bind_param("sssi", $nome, $cognome, $email, $idUtente);

        if ($query->execute()) {
            $_SESSION['alert'] = ['type' => 'success', 'message' => 'I tuoi dati sono stati modificati!']; 
        } else {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Impossibile modificare i tuoi dati'];
        }
        $query->close();
        header("Location: ../pages/profilo.php");
    }
    $conn->close();
?>