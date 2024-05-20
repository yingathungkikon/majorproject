<?php

    session_start();
    include('../../../connection/connect.php');
    require_once '../../../../phpqrcode/qrlib.php'; // Include QR code library

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $pc_number = $_POST["pc_number"];
        $processor = $_POST["processor"];
        $ram = $_POST["ram"];
        $storage = $_POST["storage"];
        $problem = $_POST["problem"];

        // Generate QR code text
        $qrText = "Brand: $brand\nModel: $model\nPC Number: $pc_number\nProcessor: $processor\nRAM: $ram\nStorage: $storage\nProblem: $problem";

        // Set QR code image path
        $qrCodeImagePath = "../image/qr_image_$pc_number.png"; // Unique filename based on PC number

        // Generate QR code
        QRcode::png($qrText, $qrCodeImagePath);

        // Update data in the database
        $sql = "UPDATE btlaptops 
                SET brand = '$brand', model = '$model', pc_number = '$pc_number', 
                    processor = '$processor', ram = '$ram', storage = '$storage', problem = '$problem', qr_img = '$qrCodeImagePath'
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
