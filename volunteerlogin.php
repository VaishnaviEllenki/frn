<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "rtrp";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get login details
$email = $_POST['email'];
$password = $_POST['password'];

// Check credentials in the database
$sql = "SELECT * FROM volunteers WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['volunteer_email'] = $email; // Store session
        header("Location: volunteerdash.html"); // Redirect to dashboard
        exit();
    } else {
        echo "Invalid password!";
    }
} else {
    echo "Invalid email!";
}

$conn->close();
?>
