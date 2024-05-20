<?php
session_start();


include('../connection/conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $pc_number = $_POST["pc_number"];
    $processor = $_POST["processor"];
    $ram = $_POST["ram"];
    $storage = $_POST["storage"];
    $problem = $_POST["problem"];

    $sql = "INSERT INTO computers (brand, model, pc_number, processor, ram, storage,problem) 
            VALUES ('$brand', '$model', '$pc_number', '$processor', '$ram', '$storage','$problem')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/admin_view.php");;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {

    header("Location: add.php");
    exit();
}
?>
