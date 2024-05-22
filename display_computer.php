<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include('connection/connect.php');

if (isset($_GET['pc_number'])) {
    $pc_number = $_GET['pc_number'];

    // Prepared statement to prevent SQL injection
    $query = "SELECT * FROM itcomputers WHERE pc_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $pc_number);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>Device Details</h1>";
            echo "<p>Device Name: " . htmlspecialchars($row['device_name']) . "</p>";
            echo "<p>Brand: " . htmlspecialchars($row['brand']) . "</p>";
            echo "<p>PC Number: " . htmlspecialchars($row['pc_number']) . "</p>";
            echo "<p>Processor: " . htmlspecialchars($row['processor']) . "</p>";
            echo "<p>RAM: " . htmlspecialchars($row['ram']) . "</p>";
            echo "<p>System Type: " . htmlspecialchars($row['system_type']) . "</p>";
            echo "<p>Pen Touch: " . htmlspecialchars($row['pen_touch']) . "</p>";
            echo "<p>Problem: " . htmlspecialchars($row['problem']) . "</p>";
        } else {
            echo "<p>No details found for this device.</p>";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
} else {
    echo "<p>No device PC number provided.</p>";
}

$conn->close(); // Close the database connection
?>
