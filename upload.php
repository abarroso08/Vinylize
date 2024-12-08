<?php
// Start the session to access user data
session_start();

// Include the database connection
require 'assets/db.php';

try {
    // Ensure the user is logged in
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("Unauthorized access: Please log in.");
        header("Location: login.php");
        exit;
    }

    // Validate that all required GET parameters are present
    if (!isset($_GET['color']) || !isset($_GET['texture']) || !isset($_GET['img']) || !isset($_GET['engraving']) || !isset($_GET['fontFamily']) || !isset($_GET['fontSize'])) {
        throw new Exception("Missing required parameters");
    }

    // Get user ID from the session
    $userId = $_SESSION['user_id'];

    // Get variables from the GET request
    $color = trim($_GET['color']);
    $texture = trim($_GET['texture']);
    $imgURL = trim($_GET['img']);
    $engraving = trim($_GET['engraving']);
    $fontFamily = trim($_GET['fontFamily']);
    $fontSize = trim($_GET['fontSize']);

    // Input validation (add more robust validation as needed)
    if (empty($color) || empty($texture) || empty($imgURL) || empty($fontFamily) || empty($fontSize)) {
        throw new Exception("Invalid input: color, texture, imgURL, fontFamily, and fontSize are required");
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO VinylDetails (userId, color, texture, imgURL, engraving, fontFamily, fontSize) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("issssss", $userId, $color, $texture, $imgURL, $engraving, $fontFamily, $fontSize);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: saved-vinyls.php");
        exit;
    } else {
        throw new Exception("Failed to upload vinyl details: " . $stmt->error);
    }
} catch (Exception $e) {
    // Handle errors
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>
