<?php
    session_start();
    include('../../../connection/connect.php');
    require '../../../../phpqrcode/qrlib.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract form data
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $pr_number = $_POST['pr_number'];
        $color = $_POST['color'];
        $type = $_POST['type'];
        $resolution = $_POST['resolution'];
        $problem = $_POST['problem'];
        $qr_img = $_POST['qr_img']; // Assuming this is the name attribute of your input field

        // Generate QR code text
        $qrText = "Brand: $brand\nModel: $model\nPR Number: $pr_number\nColor: $color\nType: $type\nResolution: $resolution\nProblem: $problem";

        // Set QR code image path
        $qrCodeImagePath = '../image/qr_image.png'; // Adjusted path

        // Generate QR code
        QRcode::png($qrText, $qrCodeImagePath);

        // Insert data into the database
        $insert_sql = "INSERT INTO cseprinters (brand, model, pr_number, color, type, resolution, problem, qr_img) 
                       VALUES ('$brand', '$model', '$pr_number', '$color', '$type', '$resolution', '$problem', '$qrCodeImagePath')";

        if ($conn->query($insert_sql) === TRUE) {
            header("Location: ../pages/adminview.php");
            exit(); // Add an exit after redirection
        } else {
            echo "Error: " . $insert_sql . "<br>" . $connect->error; // Correctly output the error message
        }

        $connect->close(); // Close the database connection
    } else {
        header("Location: add_printer.php");
        exit();
    }
?>