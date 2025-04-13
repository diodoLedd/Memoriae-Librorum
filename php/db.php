<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'memoriae_librorum';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("errore di connessione: ".$conn->connect_error);
    }
?>