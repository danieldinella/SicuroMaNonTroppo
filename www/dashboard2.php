<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SicuroMaNonTroppo</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!-- Include il tuo CSS personalizzato -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header-container">
        <h1 class="text-success">Benvenuto nella Dashboard</h1>
    </div>

    <div class="container mt-4">
        <div class="search-container text-center">
            <form action="search.php" method="get">
                <input type="text" name="query" class="form-control form-control-lg mb-2" placeholder="Cerca...">
                <button type="submit" class="btn btn-success btn-lg">Cerca</button>
            </form>
        </div>

        <div class="results-container mt-4 p-4 bg-light rounded">
            <h5>Risultati della ricerca:</h5>
            <ul>
                <?php
                if (isset($_SESSION['results'])) {
                    $results = $_SESSION['results'];
                    foreach ($results as $result) {
                        foreach ($result as $key => $value) {
                            if ($key != 'id') {
                                echo '<li>' .htmlspecialchars($key).": ".htmlspecialchars($value) . '</li>';
                            }
                        }
                        echo '</br>';
                    }
                } else {
                    echo '<p class="text-danger">Nessun risultato trovato.</p>';
                }
                unset($_SESSION['results']);
                ?>
            </ul>
        </div>
    </div>

    <footer class="text-center my-4">
        <p class="text-light">&copy; 2024 SicuroMaNonTroppo. La tua sicurezza, a modo nostro.</p>
    </footer>

    <!-- Include jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
