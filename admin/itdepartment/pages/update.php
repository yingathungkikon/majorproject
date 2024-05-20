<?php
session_start();
include('../connection/conn.php');
$id = $_GET["id"];

$sql = "SELECT * FROM computers WHERE id = '$id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <style type="text/css">
        .form-group{
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Update Item</h2>
                <form action="../includes/update_process.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="brand">Brand:</label>
                        <input type="text" class="form-control" name="brand" value="<?php echo $row['brand']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="model">Model:</label>
                        <input type="text" class="form-control" name="model" value="<?php echo $row['model']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pc_number">PC Number:</label> 
                        <input type="text" class="form-control" name="pc_number" value="<?php echo $row['pc_number']; ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="processor">Processor:</label>
                        <input type="text" class="form-control" name="processor" value="<?php echo $row['processor']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ram">RAM:</label>
                        <input type="text" class="form-control" name="ram" value="<?php echo $row['ram']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="storage">Storage:</label>
                        <input type="text" class="form-control" name="storage" value="<?php echo $row['storage']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="problem">Problem:</label>
                        <input type="text" class="form-control" name="problem" value="<?php echo $row['problem']; ?>">
                    </div>
                    <button type="submit" class="btn mt-3 btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
} else {
    echo "Item not found";
}
$conn->close();
?>
