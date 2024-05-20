<?php

    session_start();
    include('../../../connection/connect.php');
    require_once '../../../../phpqrcode/qrlib.php'; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $pc_number = $_POST["pc_number"];
        $processor = $_POST["processor"];
        $ram = $_POST["ram"];
        $storage = $_POST["storage"];
        $problem = $_POST["problem"];
        $image = $_POST["image"];


        $qrText = "Brand: $brand\nModel: $model\nPC Number: $pc_number\nProcessor: $processor\nRAM: $ram\nStorage: $storage\nProblem: $problem\nImage: $image";



        $qrCodeImagePath = "../image/qr_image_$pc_number.png";
        // $imagePath = '../image';


        QRcode::png($qrText, $qrCodeImagePath);

        $sql = "UPDATE aetcomputers 
                SET brand = '$brand', model = '$model', pc_number = '$pc_number', 
                    processor = '$processor', ram = '$ram', storage = '$storage', problem = '$problem',image = '$image', qr_img = '$qrCodeImagePath'
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

