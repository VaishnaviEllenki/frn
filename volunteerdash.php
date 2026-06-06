<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rtrp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch donor details
$sql = "SELECT id, name, food_type, quantity,location FROM donordash WHERE status='pending'";
$result = $conn->query($sql);

if(!$result){
    die("SQL Error:" .$conn->error);
}

if ($result->num_rows > 0) {
    echo "<ul class='pickup-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<li class='pickup-item'>";
        echo "<strong>Donor Name:</strong> " .($row['name']) . "<br>";
        echo "<strong>Food Type:</strong> " . ($row['food_type']) . "<br>";
        echo "<strong>Quantity:</strong> " . ($row['quantity']) . "<br>";
        echo "<strong>Pickup Location:</strong> " .($row['location']) . "<br>";
        echo '
<form action="accept_pickup.php" method="POST">

    <input type="hidden"
           name="donation_id"
           value="'.$row['id'].'">

    <button type="submit" class="btn btn-primary">
        Accept Pickup <i class="fa-solid fa-check"></i>
    </button>

</form>';
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No available pickups at the moment.</p>";
}

$conn->close();
?>
