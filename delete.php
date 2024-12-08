<?php
session_start();

// Include the database connection
require 'assets/db.php';

try {
    // Ensure the user is logged in
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("Unauthorized access: Please log in.");
    }

    // Validate the ID parameter
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        throw new Exception("Invalid or missing vinyl ID.");
    }

    // Get the user ID from the session and the vinyl ID from GET
    $userId = $_SESSION['user_id'];
    $vinylId = intval($_GET['id']);

    // Delete the vinyl if it belongs to the logged-in use
    define('DB_SERVER', '127.0.0.1:3306');
define('DB_USERNAME', 'u803318305_vinylize');
define('DB_PASSWORD', 'Vinylize141');
define('DB_NAME', 'u803318305_vinylize');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $GLOBALS['conexion'] = $pdo;
} catch (PDOException $error) {
    $GLOBALS['error'] = $error;
    die("ERROR: No se pudo conectar. " . $error->getMessage());
}
    $stmt = $pdo->prepare("DELETE FROM VinylDetails WHERE id = ? AND userId = ?");
    $stmt->execute([$vinylId, $userId]);

    if ($stmt->rowCount() === 0) {
        throw new Exception("Failed to delete vinyl. It may not exist or does not belong to you.");
    }

    // Redirect to the saved vinyls page with a success message
    header("Location: saved-vinyls.php?message=Vinyl deleted successfully");
    exit;
} catch (Exception $e) {
    // Handle errors
    die("Error: " . $e->getMessage());
}
?>