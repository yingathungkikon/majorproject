<?php
session_start();

include('../../../phpqrcode/qrlib.php'); // Adjust the path to qrlib.php

include('../connection/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $pc_number = $_POST["pc_number"];
    $processor = $_POST["processor"];
    $ram = $_POST["ram"];
    $storage = $_POST["storage"];
    $problem = $_POST["problem"];
    $dept_id = $_POST["dept_id"];

    // Insert into appropriate department table based on dept_id
    $dept_table = ''; // Initialize department table variable

    switch ($dept_id) {
        case 1:
            $dept_table = 'aet_dept';
            $image = 'aet_dept'; // Adjust folder name according to your project structure
            break;
        case 2:
            $dept_table = 'bt_dept';
            $image = 'bt_dept';
            break;
        case 3:
            $dept_table = 'cse_dept';
            $image = 'cse_dept';
            break;
        case 4:
            $dept_table = 'ece_dept';
            $image = 'ece_dept';
            break;
        case 5:
            $dept_table = 'it_dept';
            $image = 'it_dept';
            break;
        // Add cases for other departments as needed
        default:
            echo "Error: Invalid department ID.";
            return; // Exit the script
    }

    // Prepare SQL statement
    $sql_insert = "INSERT INTO $dept_table (brand, model, pc_number, processor, ram, storage, problem,created_at) VALUES ('$brand', '$model', '$pc_number', '$processor', '$ram', '$storage', '$problem', CURRENT_TIMESTAMP)";

    // Execute SQL statement
    if ($conn->query($sql_insert) === TRUE) {
        // Generate QR code
        $data = "Brand: $brand\nModel: $model\nPC Number: $pc_number\nProcessor: $processor\nRAM: $ram\nStorage: $storage\nProblem: $problem";
        $qr_filename = "../../../$image/qr_" . time() . ".png"; // Adjust the path to the department folder
        QRcode::png($data, $qr_filename);

        // Redirect to admin_view.php
        header("Location: ../pages/admin.php");
        exit();
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Redirect to add.php if accessed directly without POST request
    header("Location: add.php");
    exit();
}
?>
