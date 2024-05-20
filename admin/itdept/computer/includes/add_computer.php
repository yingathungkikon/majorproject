<?php
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

    // Generate QR Code
    $qrText = "Device Name: $device_name\nBrand: $brand\nPC Number: $pc_number\nProcessor: $processor\nRAM: $ram\nSystem Type: $system_type\nPen Touch: $pen_touch\nProblem: $problem";
    $url = 'http://192.168.208.63/majorproject/login/login.php';
    $qrCodeImagePath = '../image'; 
    QRcode::png($qrText, $qrCodeImagePath);
    // QRcode::png($url, $qrCodeImagePath);

    $insert_sql = "INSERT INTO itcomputers (device_name, brand, pc_number, processor, ram, system_type, pen_touch, problem, qr_img) 
                   VALUES ('$device_name', '$brand', '$pc_number', '$processor', '$ram', '$system_type', '$pen_touch', '$problem', '$qrCodeImagePath')";

    if ($conn->query($insert_sql) === TRUE) {
        header("Location: ../pages/adminview.php");
        exit();
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error; 
    }
} else {
    header("Location: add_computer.php");
    exit();
}

$conn->close(); 
?>
