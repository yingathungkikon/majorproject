<?php

    session_start();
    include('../../../connection/connect.php');
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
        $qr_img = $_POST['qr_img']; 
        $qrText = "Device Name: $device_name\nBrand: $brand\nPC Number: $pc_number\nProcessor: $processor\nRAM: $ram\nSystem Type: $system_type\nPen Touch: $pen_touch\nProblem: $problem";
        // $url = 'http://192.168.208.63/majorproject/login/login.php';
        $qrCodeImagePath = "../image/qr_image_$pc_number.png"; 

        QRcode::png($qrText, $qrCodeImagePath);
        // QRcode::png($url, $qrCodeImagePath);

        $sql = "UPDATE itcomputers 
                SET  device_name = '$device_name', brand = '$brand',pc_number = '$pc_number',processor = '$processor', ram = '$ram', system_type = '$system_type',pen_touch = '$pen_touch', problem = '$problem', qr_img = '$qrCodeImagePath'
                WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../pages/adminview.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $conn->close();
?>
