<?php
require 'assets/db.php'; // Include database connection
session_start(); // Start session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize inputs
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Input validation
    if (empty($email) || empty($password) || empty($confirm_password)) {
        echo json_encode(["error" => "All fields are required."]);
        exit;
    }

    if ($password !== $confirm_password) {
        echo json_encode(["error" => "Passwords do not match."]);
        exit;
    }

    try {
        // Check if the user already exists
        $stmt = $conn->prepare("SELECT UserId FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo json_encode(["error" => "An account with this email already exists."]);
            exit;
        }

        // Insert new user into the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $insert_stmt = $conn->prepare("INSERT INTO users (Email, userPassword) VALUES (?, ?)");
        $insert_stmt->bind_param("ss", $email, $hashed_password);

        if ($insert_stmt->execute()) {
            // Registration successful

            echo json_encode(["success" => "Registration successful!", "redirect" => "dashboard.php"]);
            header("Location: login.php"); // Redirect to login page
            exit;
        } else {
            echo json_encode(["error" => "Error registering user: " . $conn->error]);
        }
    } catch (Exception $e) {
        echo json_encode(["error" => "An error occurred: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Invalid request method."]);
}
?>
