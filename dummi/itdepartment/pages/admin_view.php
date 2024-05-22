<?php
session_start();
include('../connection/conn.php');
$sql = "SELECT * FROM computers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update Inventory</title>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <style>
        .container{
            border: 2px solid lightblue;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        .thead th{
            background-color: burlywood;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../../../adminhome.php">Home</a>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="../includes/add_process.php" method="post">
                    <h3 class="text-center mb-4">ADD NEW ITEM</h3>
                    <div class="form-group">
                        <label for="brand">BRAND:</label>
                        <input type="text" class="form-control" id="brand" name="brand">
                    </div>
                    <div class="form-group">
                        <label for="model">MODEL:</label>
                        <input type="text" class="form-control" id="model" name="model">
                    </div>
                    <div class="form-group">
                        <label for="pc_number">PC NUMBER:</label>
                        <input type="text" class="form-control" id="pc_number" name="pc_number">
                    </div>
                    <div class="form-group">
                        <label for="processor">PROCESSOR:</label>
                        <input type="text" class="form-control" id="processor" name="processor">
                    </div>
                    <div class="form-group">
                        <label for="ram">RAM:</label>
                        <input type="text" class="form-control" id="ram" name="ram">
                    </div>
                    <div class="form-group">
                        <label for="storage">STORAGE:</label>
                        <input type="text" class="form-control" id="storage" name="storage">
                    </div>
                    <div class="form-group">
                        <label for="problem">Problem:</label>
                        <input type="text" class="form-control" id="problem" name="problem">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="mt-4 mb-3 text-center">Current Inventory</h3>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Pc Number</th>
                        <th>Processor</th>
                        <th>RAM</th>
                        <th>Storage</th>
                        <th>Problem</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["brand"] . "</td>";
                            echo "<td>" . $row["model"] . "</td>";
                            echo "<td>" . $row["pc_number"] . "</td>";
                            echo "<td>" . $row["processor"] . "</td>";
                            echo "<td>" . $row["ram"] . "</td>";
                            echo "<td>" . $row["storage"] . "</td>";
                            echo "<td>" . $row["problem"] . "</td>";
                            echo "<td><a href='update.php?id=" . $row["id"] . "' class='btn btn-primary'>Update</a>&nbsp;&nbsp;<a href='../includes/delete_process.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No inventory found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>

<?php
$conn->close();
?>
