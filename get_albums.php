<?php
// Set the response header to JSON
header('Content-Type: application/json');

// Database connection (replace with your connection details)
$servername = "127.0.0.1:3306";
$username = "u803318305_vinylize";
$password = "Vinylize141";
$dbname = "u803318305_vinylize";

try {
    // Establish the database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Database connection failed: " . $conn->connect_error);
    }

    // Get artist ID from the request and validate it
    $artistID = isset($_GET['artist_id']) ? intval($_GET['artist_id']) : 0;

    if ($artistID <= 0) {
        throw new Exception("Invalid artist ID");
    }

    // Prepare the query
    $stmt = $conn->prepare("SELECT * FROM albums WHERE ArtistID = ?");
    if (!$stmt) {
        throw new Exception("Query preparation failed: " . $conn->error);
    }

    // Bind parameters and execute the query
    $stmt->bind_param("i", $artistID);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    $albums = [];
    while ($album = $result->fetch_assoc()) {
        $albums[] = $album;
    }

    // Free resources
    $stmt->close();
    $conn->close();

    // Return data as JSON
    echo json_encode($albums);
} catch (Exception $e) {
    // Handle errors gracefully
    http_response_code(500); // Set HTTP status code to 500
    echo json_encode(["error" => $e->getMessage()]);
    exit;
}
