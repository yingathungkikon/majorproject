<?php
session_start();
include('../../../../connection/connect.php');
require_once '../../../../phpqrcode/qrlib.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
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
    $qrCodeImagePath = $qrCodeDir . 'qr_image_' . $pc_number . '.png';

    // URL to be embedded in the QR code
    $url = "http://yingathungkikon.000.pe/user/login.php?pc_number=" . urlencode($pc_number);

    // Generate the QR code with the URL
    QRcode::png($url, $qrCodeImagePath);

    // Update query with prepared statements to prevent SQL injection
    $sql = "UPDATE itcomputers 
            SET device_name = ?, brand = ?, pc_number = ?, processor = ?, ram = ?, system_type = ?, pen_touch = ?, problem = ?, qr_img = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $device_name, $brand, $pc_number, $processor, $ram, $system_type, $pen_touch, $problem, $qrCodeImagePath, $id);

    if ($stmt->execute()) {
        header("Location: ../pages/adminview.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Redirect if not a POST request
    header("Location: add_computer.php");
    exit();
}

$conn->close();
?>
