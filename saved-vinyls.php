<?php
include "assets/head.php";
include "assets/nav.php"; 

// Start a session to get the logged-in user (assuming you're using session-based login)
session_start();
$user_id = $_SESSION['user_id']; // Get the user ID from session

// Connect to your database (ensure the correct DB connection details are here)
$pdo = new PDO("mysql:host=localhost;dbname=vinylize", "root", ""); // Adjust with actual credentials
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch saved vinyls for the logged-in user
$query = "
    SELECT a.AlbumName, a.CoverImage, ar.ArtistName
    FROM SavedVinyls sv
    JOIN Albums a ON sv.AlbumID = a.AlbumID
    JOIN Artists ar ON a.ArtistID = ar.ArtistID
    WHERE sv.UserID = :user_id
    ORDER BY sv.SaveDate DESC
";

$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $user_id]);
$saved_vinyls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="text-center font-roboto text-4xl md:text-5xl text-indigo-600 mt-4">
    Your Saved Vinyls
</h1>

<!-- Display the saved vinyls -->
<div class="container mt-5">
    <div class="row">
        <?php if ($saved_vinyls): ?>
            <?php foreach ($saved_vinyls as $vinyl): ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($vinyl['CoverImage']); ?>" class="card-img-top" alt="Album cover">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($vinyl['AlbumName']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($vinyl['ArtistName']); ?></p>
                            <a href="album-details.php?album_id=<?php echo $vinyl['AlbumID']; ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
include "assets/footer.php";
?>
