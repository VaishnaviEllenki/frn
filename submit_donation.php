<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rtrp";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$food_type = $_POST['food_type'];
$quantity = $_POST['quantity'];
$additional_info = $_POST['additional_info'];

// Insert data into donordash table
$sql = "INSERT INTO donordash (name, email, phone, location, food_type, quantity, additional_info) 
        VALUES ('$name', '$email', '$phone', '$location', '$food_type', '$quantity', '$additional_info')";

if ($conn->query($sql) === TRUE) {
    echo "Donation submitted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
