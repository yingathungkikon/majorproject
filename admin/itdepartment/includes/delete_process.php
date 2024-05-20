<?php
session_start();


include('../connection/conn.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM computers WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if($stmt) {

        $stmt->bind_param("i", $id);
        if($stmt->execute()) {
            header("Location: ../pages/admin_view.php");
            exit;
        } else {
            echo "Error executing delete statement: " . $stmt->error;
        }
    } else {
        echo "Error preparing delete statement: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: ../pages/admin_view.php");
    exit;
}

$conn->close();
?>
