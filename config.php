<?php
$host = "localhost";
$user = "root";  // Default user in XAMPP
$password = "";  // Default is empty
$database = "food_rescue_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
