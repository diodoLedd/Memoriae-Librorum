<?php
    require "db.php";

    session_start();

    if (!isset($_SESSION["idUtente"])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["password-vecchia"], $_POST["password-nuova"])) {
        $passwordVecchia = trim($_POST["password-vecchia"]);
        $passwordNuova = trim($_POST["password-nuova"]);
        $idUtente = $_SESSION["idUtente"];

        $query = $conn->prepare("SELECT passwordHash FROM tblUtenti WHERE idUtente = ?");
        $query->bind_param("i", $idUtente);
        $query->execute();
        $query->store_result();

        if ($query->num_rows > 0) {
            $query->bind_result($passwordHash);
            $query->fetch();

            if (password_verify($passwordVecchia, $passwordHash)) {
                $passwordHashNuova = password_hash($passwordNuova, PASSWORD_BCRYPT);

                $query2 = $conn->prepare("UPDATE tblUtenti SET passwordHash = ? WHERE idUtente = ?");
                $query2->bind_param("si", $passwordHashNuova, $idUtente);
                if ($query2->execute()) {
                    $_SESSION['alert'] = ['type' => 'success', 'message' => 'Password aggiornata!']; 
                    header("Location: ../pages/profilo.php");
                } else {
                    $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Errore nell\'aggiornamento della password']; 
                    header("Location: ../pages/profilo.php");
                }
                $query2->close();
            } else {
                $_SESSION['alert'] = ['type' => 'danger', 'message' => 'La vecchia password non è corretta']; 
                header("Location: ../pages/profilo.php");
            }
        } else {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Utente non trovato'];
            header("Location: ../pages/profilo.php");
        }
        $query->close();
    }
    $conn->close();
?>
