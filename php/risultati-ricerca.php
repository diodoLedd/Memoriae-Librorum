<?php
    include 'db.php';
    session_start();

    if (!isset($_SESSION['idUtente'])) {
        header("Location: ../pages/accedi.php");
        exit();
    }

    $richiesta = isset($_GET['query']) ? urldecode(trim($_GET['query'])) : '';

    $like = "%" . $richiesta . "%";
    $query = $conn->prepare(
        "SELECT tblLibri.*, tblAutori.nome AS nomeAutore, tblAutori.cognome AS cognomeAutore, tblGeneri.nome AS nomeGenere 
        FROM tblLibri 
        INNER JOIN tblAutori ON tblLibri.autoreId = tblAutori.idAutore 
        INNER JOIN tblGeneri ON tblLibri.genereId = tblGeneri.idGenere 
        WHERE tblLibri.titolo LIKE ?"
    );
    $query->bind_param("s", $like);
    $query->execute();
    $results = $query->get_result();
?>