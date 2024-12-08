<?php
include "assets/head.php";
session_start(); // Start or resume the session

// Database connection using PDO
define('DB_SERVER', '127.0.0.1:3306');
define('DB_USERNAME', 'u803318305_vinylize');
define('DB_PASSWORD', 'Vinylize141');
define('DB_NAME', 'u803318305_vinylize');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die("ERROR: Could not connect. " . $error->getMessage());
}

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['email_or_phone'])) {
    die("You must be logged in to buy a vinyl.");
}

// Get the vinyl ID from the query string
if (!isset($_GET['id'])) {
    die("No vinyl ID provided.");
}

$vinylId = htmlspecialchars($_GET['id']);

// Fetch the vinyl details
try {
    $stmt = $pdo->prepare("SELECT * FROM VinylDetails WHERE id = ?");
    $stmt->execute([$vinylId]);
    $vinyl = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$vinyl) {
        die("Vinyl not found.");
    }
} catch (Exception $e) {
    die("An error occurred: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Vinyl</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            gap: 20px;
        }

        .vinyl-preview {
            flex: 1 1 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .vinyl-preview .rotative-container {
            width: 100%;
            max-width: 400px;
        }

        .vinyl-details {
            flex: 1 1 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .vinyl-details h3, .vinyl-details p {
            margin: 0;
        }

        .vinyl-details .price {
            font-size: 2em;
            font-weight: bold;
            color: #27ae60;
        }

        .vinyl-details .buy-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .vinyl-details .buy-button:hover {
            background-color: #2ecc71;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
     <?php include "assets/nav.php" ?>
     <!-- Aqui va el código de la página.
     include: añade los archivos nav.php y footer.php a este código literalmente como si hiciera un copy/paste.-->

     <h1 class="text-center font-pacifico text-4xl md:text-5xl text-indigo-600 mt-4">
          Buy Your Vinyl
     </h1>


     <!--Footer.php contiene el cierre de body y html, por eso no hace falta ponerlo aqui-->
     <?php include "assets/footer.php" ?>