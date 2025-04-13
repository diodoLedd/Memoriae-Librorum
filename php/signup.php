<?php
    require 'db.php';

    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"])) {
        $nome = trim($_POST['nome']);
        $cognome = trim($_POST['cognome']);
        $email = trim($_POST['email']);
        $passwordHash = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

        $query = $conn->prepare("INSERT INTO tblUtenti (nome, cognome, email, passwordHash) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssss", $nome, $cognome, $email, $passwordHash);
        
        try {
            if ($query->execute()) {
                $_SESSION['alert'] = [
                    'type' => 'success',
                    'message' => 'Registrazione completata! Ora puoi accedere.'
                ];
                header("Location: ../pages/accedi.php");
                exit();
            }
        } catch (mysqli_sql_exception $e) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'message' => 'Errore: Email già registrata!'
            ];
            header("Location: ../pages/registrati.php");
            exit();
        }
    }
    $conn->close();
?>