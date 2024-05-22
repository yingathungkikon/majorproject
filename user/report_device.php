<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('../connection/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pc_number = $_POST['pc_number'];
    $reportMessage = $_POST['reportMessage'];
    
    // Fetch the admin email from the database
    $admin_email_query = "SELECT email FROM users_regis WHERE role = 'admin' LIMIT 1";
    $admin_result = $conn->query($admin_email_query);
    
    if ($admin_result->num_rows > 0) {
        $admin_row = $admin_result->fetch_assoc();
        $admin_email = $admin_row['email'];
    } else {
        echo "No admin email found.";
        exit();
    }

    // Fetch the sender's email (assuming it's the logged-in user)
    $sender_email_query = "SELECT email FROM users_regis WHERE username = ?";
    $stmt = $conn->prepare($sender_email_query);
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $sender_result = $stmt->get_result();
    
    if ($sender_result->num_rows > 0) {
        $sender_row = $sender_result->fetch_assoc();
        $sender_email = $sender_row['email'];
    } else {
        echo "No sender email found.";
        exit();
    }

    // Retrieve device details for the report
    $query = "SELECT * FROM itcomputers WHERE pc_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $pc_number);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $device_details = "Device Name: " . $row['device_name'] . "\n" .
                              "Brand: " . $row['brand'] . "\n" .
                              "PC Number: " . $row['pc_number'] . "\n" .
                              "Processor: " . $row['processor'] . "\n" .
                              "RAM: " . $row['ram'] . "\n" .
                              "System Type: " . $row['system_type'] . "\n" .
                              "Pen Touch: " . $row['pen_touch'] . "\n" .
                              "Problem: " . $row['problem'] . "\n\n" .
                              "Report Message: " . $reportMessage;

            // Send email to the admin
            $subject = "Device Report: PC Number $pc_number";
            $headers = "From: $sender_email";

            if (mail($admin_email, $subject, $device_details, $headers)) {
                $_SESSION["success"] = "Device reported successfully.";
                header("Location: success_page.php"); // Redirect to a success page
                exit();
            } else {
                echo "Error sending email.";
            }
        } else {
            echo "No details found for this device.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
} else {
    echo "Invalid request.";
}

$conn->close(); // Close the database connection
?>
