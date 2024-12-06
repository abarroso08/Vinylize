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
    die("You must be logged in to view saved vinyls.");
}

// Get the user ID from session
$userId = $_SESSION['user_id'];

try {
    // Fetch all saved vinyls for the user
    $stmt = $pdo->prepare("SELECT * FROM VinylDetails WHERE userId = ?");
    $stmt->execute([$userId]);
    $vinyls = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("An error occurred: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Saved Vinyls</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include "assets/nav.php"; ?>

    <div class="container w-100 d-flex flex-column align-items-center justify-content-center">
        <h1>Your Saved Vinyls</h1>
        <?php if (empty($vinyls)) : ?>
            <p>You have no saved vinyls yet.</p>
        <?php else : ?>
            <div class="vinyl-list row w-100">
                <?php foreach ($vinyls as $vinyl) : ?>
                    <div class="col-12 col-sm-6 d-flex flex-column align-items-center justify-content-center">
                        <!-- Rotative vinyl -->
                        <div class="rotative-container" style="width:400px;height:200px">
                             <div class="main-container">
                                  <!-- Cover image -->
                                  <div id="square" class="square" style="background:url(<?= htmlspecialchars($vinyl['imgURL']); ?>);"></div>
                                  <div class="vinyl-container">
                                       <p class="disk-text" style="font-family: <?= htmlspecialchars($vinyl['fontFamily']); ?>; font-size: <?= htmlspecialchars($vinyl['fontSize']); ?>px;">
                                           <?= htmlspecialchars($vinyl['engraving']); ?>
                                       </p>
                                       <div alt="Current Vinyl Design" id="vinylImage" class="circle-black <?= htmlspecialchars($vinyl['color']); ?> <?= htmlspecialchars($vinyl['texture']); ?>"></div>
                                       <div id="circle" class="circle" style="background:url(<?= htmlspecialchars($vinyl['imgURL']); ?>);"></div>
                                  </div>
                             </div>
                        </div>
                        <div class="d-flex flex-row">
    <a href="buy.php?id=<?= htmlspecialchars($vinyl['id']); ?>" class="btn btn-success m-2">Buy</a>
    <a href="select-engraving.php?img=<?= urlencode($vinyl['imgURL']); ?>&color=<?= urlencode($vinyl['color']); ?>&texture=<?= urlencode($vinyl['texture']); ?>&engraving=<?= urlencode($vinyl['engraving']); ?>&fontFamily=<?= urlencode($vinyl['fontFamily']); ?>&fontSize=<?= urlencode($vinyl['fontSize']); ?>&editId=<?= htmlspecialchars($vinyl['id']); ?>" class="btn btn-primary m-2">Edit</a>
    <a href="delete.php?id=<?= htmlspecialchars($vinyl['id']); ?>" class="btn btn-danger m-2" onclick="return confirm('Are you sure you want to delete this vinyl?');">Delete</a>
</div>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php include "assets/footer.php"; ?>
</body>
</html>
