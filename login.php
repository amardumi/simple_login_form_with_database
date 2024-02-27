<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform SQL query to check user credentials
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard or another page
        exit();
    } else {
        // Login failed
        echo "Invalid username or password.";
    }
}

// Close the connection
$conn->close();
?>
