<?php

session_start();
include('../connection/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $pc_number = $_POST["pc_number"];
    $processor = $_POST["processor"];
    $ram = $_POST["ram"];
    $storage = $_POST["storage"];
    $problem = $_POST["problem"];

    $sql = "UPDATE computers 
            SET brand = '$brand', model = '$model', pc_number = '$pc_number', 
                processor = '$processor', ram = '$ram', storage = '$storage',problem = '$problem' 
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {

        header("Location: ../pages/admin_view.php");
        exit();
    } else {

        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
