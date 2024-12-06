<?php
session_start(); // Start session to manage login state

// Include the database connection
require 'assets/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email_or_phone = trim($_POST['email_or_phone']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($email_or_phone) || empty($password)) {
        echo json_encode(["error" => "Email/Phone and Password are required."]);
        exit;
    }

    try {
        // Prepare and execute the query to fetch user details
        $stmt = $conn->prepare("SELECT UserId, userPassword FROM users WHERE email = ?");
        $stmt->bind_param("s", $email_or_phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch the user record
            $user = $result->fetch_assoc();

            // Verify the password (assuming passwords are stored as hashes)
            if (password_verify($password, $user['userPassword'])) {
                // Store user information in the session
                $_SESSION['user_id'] = $user['UserId'];
                $_SESSION['email_or_phone'] = $email_or_phone;

                // Redirect to the specified URL
                if (isset($_GET['url']) && !empty($_GET['url'])) {
                    // Sanitize the redirect URL to prevent open redirect vulnerabilities
                    $redirect_url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
                    header("Location: " . $redirect_url); // Redirect to the specified URL
                } else {
                    header("Location: index.php"); // Redirect to index.php if no redirect URL is provided
                }
                exit; 
            } else {
                // Invalid password
                echo json_encode(["error" => "Invalid email/phone or password."]);
            }
        } else {
            // No user found with the provided email/phone
            echo json_encode(["error" => "Invalid email/phone or password."]);
        }
    } catch (Exception $e) {
        // Handle query or server errors
        echo json_encode(["error" => "An error occurred: " . $e->getMessage()]);
    }
} else {
    // Invalid request method
    echo json_encode(["error" => "Invalid request method."]);
}
?>
