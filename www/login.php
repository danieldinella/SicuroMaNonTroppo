<?php
    $conn = new mysqli("db", "daniel", "danielpass", "sqlidb");

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            header("Location: ./dashboard.html");
            exit();
        } else {
            echo "Credenziali errate.";
            echo "<br>Query eseguita correttamente ma nessuna riga trovata.";
        }
    } else {
        echo "Errore nella query SQL: " . $conn->error;
        echo "<br>Query SQL: " . $sql;
    }

    $conn->close();
?>
