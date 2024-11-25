<?php
// Database connection (replace with your connection details)
$servername = "localhost:3306";
$username = "root";
$password = "AlBaBu208?";
$dbname = "vinylize";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

// Get artist ID from the request
$artistID = intval($_GET['artist_id']);

// Retrieve albums for the given artist
$albumsQuery = "SELECT * FROM Albums WHERE ArtistID = $artistID";
$albumsResult = $conn->query($albumsQuery);

$albums = [];
while ($album = $albumsResult->fetch_assoc()) {
     $albums[] = $album;
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($albums);
