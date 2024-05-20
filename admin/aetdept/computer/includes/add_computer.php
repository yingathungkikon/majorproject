<?php
    session_start();
    include('../../../connection/connect.php');
    require '../../../../phpqrcode/qrlib.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract form data
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $pc_number = $_POST['pc_number'];
        $processor = $_POST['processor'];
        $ram = $_POST['ram'];
        $storage = $_POST['storage'];
        $problem = $_POST['problem'];
        $image = $_POST['image'];

        $qr_img = $_POST['qr_img']; 
        $qrText = "Brand: $brand\nModel: $model\nPC Number: $pc_number\nProcessor: $processor\nRAM: $ram\nStorage: $storage\nProblem: $problem\nImage: $image";

        $qrCodeImagePath = '../image/qr_image.png'; 
        // $imagePath = '../image';

        QRcode::png($qrText, $qrCodeImagePath,$imagePath);
        $insert_sql = "INSERT INTO aetcomputers (brand, model, pc_number, processor, ram, storage, problem,image, qr_img) 
                       VALUES ('$brand', '$model', '$pc_number', '$processor', '$ram', '$storage', '$problem','$image', '$qrCodeImagePath')";

        if ($conn->query($insert_sql) === TRUE) {
            header("Location: ../pages/adminview.php");
            exit();     
        } else {
            echo "Error: " . $insert_sql . "<br>" . $connect->error;
        }

        $connect->close();
    } else {
        header("Location: add_computer.php");
        exit();
    }
?>