<?php

    session_start();
    include('../../../connection/connect.php');
    require_once '../../../../phpqrcode/qrlib.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $pr_number = $_POST["pr_number"];
        $color = $_POST["color"];
        $type = $_POST["type"];
        $resolution = $_POST["resolution"];
        $problem = $_POST["problem"];

        $qrText = "Brand: $brand\nModel: $model\nPR Number: $pr_number\nColor: $color\nType: $type\nResolution: $resolution\nProblem: $problem";

        $qrCodeImagePath = "../image/qr_image_$pr_number.png"; 

        QRcode::png($qrText, $qrCodeImagePath);
        $sql = "UPDATE aetprinters 
                SET brand = '$brand', model = '$model', pr_number = '$pr_number', 
                    color = '$color', type = '$type', resolution = '$resolution', problem = '$problem', qr_img = '$qrCodeImagePath'
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
