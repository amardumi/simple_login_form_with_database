<?php
session_start();

// Hardcoded username and password for demonstration purposes
$valid_username = "amar";
$valid_password = "rai";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Validate username and password
        if ($username === $valid_username && $password === $valid_password) {
            // Set session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            // Redirect to dashboard or home page
            header("location: dashboard.php");
            exit;
        } else {
            // Invalid credentials
            $message = "Invalid username or password";
echo $message;

        }
    } else {
        // Username or password not provided
        $message = "Please enter both username and password";
echo $message;

    }
}
?>
