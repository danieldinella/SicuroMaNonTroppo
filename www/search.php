<?php
session_start();

$conn = new mysqli("db", "daniel", "danielpass", "sqlidb");

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = $_GET['query'];

$results = [];
if ($conn->multi_query("SELECT * FROM search_data WHERE title LIKE '%$sql%'")) {
    do {
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_assoc()) {
                array_push($results, $row);
            }
            $result->free();
        }
    } while ($conn->next_result());

    while ($conn->more_results()) {
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
                array_push($results, $row);
            }
            $result->free();
        }
    }
    
    $_SESSION['results'] = $results;

    header("Location: dashboard2.php?query=" . urlencode($sql));
    exit();
} else {
    echo "Errore nella query SQL: " . $conn->error;
}

$conn->close();
?>