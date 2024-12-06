<?php
session_start();

// Include database connection
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

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get user ID from session
$userId = $_SESSION['user_id'];

// Validate and fetch required parameters
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$img = isset($_GET['img']) ? htmlspecialchars($_GET['img']) : null;
$color = isset($_GET['color']) ? htmlspecialchars($_GET['color']) : null;
$texture = isset($_GET['texture']) ? htmlspecialchars($_GET['texture']) : null;
$engraving = isset($_GET['engraving']) ? htmlspecialchars($_GET['engraving']) : null;
$fontFamily = isset($_GET['fontFamily']) ? htmlspecialchars($_GET['fontFamily']) : null;
$fontSize = isset($_GET['fontSize']) ? intval($_GET['fontSize']) : null;

// Ensure all required fields are provided
if (!$id || !$img || !$color || !$texture || !$engraving || !$fontFamily || !$fontSize) {
    header("Location: saved-vinyls.php?message=NoChange");
        exit;
}

try {
    // Verify that the vinyl belongs to the logged-in user
    $stmt = $pdo->prepare("SELECT * FROM VinylDetails WHERE id = ? AND userId = ?");
    $stmt->execute([$id, $userId]);
    $vinyl = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$vinyl) {
        die("Vinyl not found or does not belong to you.");
    }

    // Update the vinyl details in the database
    $updateStmt = $pdo->prepare("
        UPDATE VinylDetails 
        SET imgURL = ?, color = ?, texture = ?, engraving = ?, fontFamily = ?, fontSize = ?
        WHERE id = ? AND userId = ?
    ");
    $updateStmt->execute([$img, $color, $texture, $engraving, $fontFamily, $fontSize, $id, $userId]);

    if ($updateStmt->rowCount() > 0) {
        // Redirect back to saved vinyls with a success message
        header("Location: saved-vinyls.php?message=Vinyl updated successfully");
        exit;
    } else {
        header("Location: saved-vinyls.php?message=No changes made");
        exit;
    }
} catch (Exception $e) {
    die("An error occurred: " . $e->getMessage());
}
