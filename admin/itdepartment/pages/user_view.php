<?php
    session_start();
    include('../connection/conn.php');  
    $sql = "SELECT * FROM computer_view";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .thead th{
            background-color:burlywood;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">IT LAB Computer Inventory</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No inventory found</td></tr>";
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
