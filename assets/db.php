<?php
// Set the response header to JSON for API responses
header('Content-Type: application/json');
// Database connection credentials
$servername = "127.0.0.1:3306";
$username = "u803318305_vinylize";
$password = "Vinylize141";
$dbname = "u803318305_vinylize";

try {
    // Establish the database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        throw new Exception("Database connection failed: " . $conn->connect_error);
    }

    // Optionally, set character encoding to UTF-8
    $conn->set_charset("utf8");
} catch (Exception $e) {
    // Return a JSON response in case of connection failure
    echo json_encode(["error" => $e->getMessage()]);
    exit; // Stop execution if the database connection fails
}
?> 