<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include('../../../connection/connect.php');
require '../../../../phpqrcode/qrlib.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device_name = $_POST['device_name'];
    $brand = $_POST['brand'];
    $pc_number = $_POST['pc_number'];
    $processor = $_POST['processor'];
    $ram = $_POST['ram'];
    $system_type = $_POST['system_type'];
    $pen_touch = $_POST['pen_touch'];
    $problem = $_POST['problem'];

    // Ensure the directory exists
    $qrCodeDir = '../image/';
    if (!is_dir($qrCodeDir)) {
        mkdir($qrCodeDir, 0755, true);
    }
    $qrCodeImagePath = $qrCodeDir . $pc_number . '.png';

    // Generate the URL that includes the PC number
    $url = "http://yingathungkikon.000.pe/user/login.php?pc_number=" . urlencode($pc_number);

    // Generate QR Code with the URL
    QRcode::png($url, $qrCodeImagePath);

    // Prepared statement to prevent SQL injection
    $insert_sql = "INSERT INTO itcomputers (device_name, brand, pc_number, processor, ram, system_type, pen_touch, problem, qr_img) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sssssssss", $device_name, $brand, $pc_number, $processor, $ram, $system_type, $pen_touch, $problem, $qrCodeImagePath);

    if ($stmt->execute()) {
        header("Location: ../pages/adminview.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
} else {
    // Redirect if not a POST request
    header("Location: add_computer.php");
    exit();
}

$conn->close(); // Close the database connection
?>
