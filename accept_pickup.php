<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rtrp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["donation_id"])) {

    $donation_id = intval($_POST["donation_id"]);

    $sql = "UPDATE donordash
            SET status='accepted'
            WHERE id=$donation_id";

    if ($conn->query($sql) === TRUE) {

        echo "Pickup accepted successfully!";

    } else {

        echo "Error: " . $conn->error;
    }

} else {

    echo "Invalid request!";
}

$conn->close();

?>