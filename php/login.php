<?php
    require "db.php";

    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"], $_POST["password"])) {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        $query = $conn->prepare("SELECT idUtente, nome, cognome, passwordHash FROM tblUtenti WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $query->store_result();
        $query->bind_result($idUtente, $nome, $cognome, $passwordHash);
        
        if ($query->fetch()) {
            if (password_verify($password, $passwordHash)) {
                $_SESSION["idUtente"] = $idUtente;
                $_SESSION["nome"] = $nome;
                $_SESSION["cognome"] = $cognome;
                $_SESSION['alert'] = ['type' => 'success', 'message' => "Benvenuto $nome!"];
                header("Location: ../pages/dashboard.php");
            } else {
                $_SESSION['alert'] = ['type' => 'danger', 'message' => "Credenziali errate"];
                header("Location: ../pages/accedi.php");
            }
        } else {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => "Utente non trovato"];
            header("Location: ../pages/accedi.php");
        }
        $query->close();
    }
    $conn->close();
?>