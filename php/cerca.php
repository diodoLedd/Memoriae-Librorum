<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['query'])) {
        $query = trim($_POST['query']);

        $query = urlencode($query);
        header("Location: ../pages/risultati.php?query=" . $query);
        exit();
    }
?>