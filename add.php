<?php
session_start();

// Check if user is logged in and is an admin
if (!isset($_SESSION['email_or_phone']) || $_SESSION['email_or_phone'] !== 'admin@admin') {
    // Redirect to login page if not admin
    header("Location: login.php");
    exit;
}

// Database connection
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artistName = htmlspecialchars($_POST['artistName']);
    $albumName = htmlspecialchars($_POST['albumName']);
    $coverImage = htmlspecialchars($_POST['coverImage']);

    try {
        // Insert the artist
        $stmt = $pdo->prepare("INSERT INTO artists (ArtistName) VALUES (:artistName)");
        $stmt->bindParam(':artistName', $artistName);
        $stmt->execute();
        $artistID = $pdo->lastInsertId();

        // Insert the album
        $stmt = $pdo->prepare("INSERT INTO albums (AlbumName, ArtistID, CoverImage) VALUES (:albumName, :artistID, :coverImage)");
        $stmt->bindParam(':albumName', $albumName);
        $stmt->bindParam(':artistID', $artistID, PDO::PARAM_INT);
        $stmt->bindParam(':coverImage', $coverImage);
        $stmt->execute();

        $successMessage = "Artist and album added successfully!";
    } catch (Exception $e) {
        $errorMessage = "An error occurred: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist and Album</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Add New Artist and Album</h1>
        <?php if (!empty($successMessage)) : ?>
            <p class="success"><?= $successMessage ?></p>
        <?php elseif (!empty($errorMessage)) : ?>
            <p class="error"><?= $errorMessage ?></p>
        <?php endif; ?>

        <form action="add.php" method="POST">
            <div>
                <label for="artistName">Artist Name:</label>
                <input type="text" id="artistName" name="artistName" required>
            </div>
            <div>
                <label for="albumName">Album Name:</label>
                <input type="text" id="albumName" name="albumName" required>
            </div>
            <div>
                <label for="coverImage">Cover Image URL:</label>
                <input type="text" id="coverImage" name="coverImage" value="/images/" required>
            </div>
            <div>
                <button type="submit">Add Artist and Album</button>
            </div>
        </form>
    </div>
</body>

</html>
