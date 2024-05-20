<?php
session_start();
include('../connection/conn.php');

function generateQRCode($data, $filename) {
    require_once '../../../phpqrcode/qrlib.php';
    QRcode::png($data, $filename);
}
// Add new item to inventory
if(isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['pc_number']) && isset($_POST['processor']) && isset($_POST['ram']) && isset($_POST['storage']) && isset($_POST['problem']) && isset($_POST['dept_id'])) {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $pc_number = $_POST['pc_number'];
    $processor = $_POST['processor'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $problem = $_POST['problem'];
    $dept_id = $_POST['dept_id'];

    // Insert into appropriate department table based on dept_id
    $dept_table = ''; // Initialize department table variable

    switch ($dept_id) {
        case 1:
            $dept_table = 'aet_dept';
            break;
        case 2:
            $dept_table = 'bt_dept';
            break;
        case 3:
            $dept_table = 'cse_dept';
            break;
        case 4:
            $dept_table = 'ece_dept';
            break;
        case 5:
            $dept_table = 'it_dept';
            break;
        default:
            echo "Error: Invalid department ID.";
            return; // Exit the script
    }

    // Prepare SQL statement
    $sql_insert = "INSERT INTO $dept_table (brand, model, pc_number, processor, ram, storage, problem) VALUES ('$brand', '$model', '$pc_number', '$processor', '$ram', '$storage', '$problem', CURRENT_TIMESTAMP)";

    // Execute SQL statement
    if ($conn->query($sql_insert) === TRUE) {
        // Generate QR code
        $data = "Brand: $brand\nModel: $model\nPC Number: $pc_number\nProcessor: $processor\nRAM: $ram\nStorage: $storage\nProblem: $problem";
        $qr_filename = "../$dept_folder/qr_" . time() . ".png"; // Adjust the path to the department folder
        generateQRCode($data, $qr_filename);
        echo "New record added successfully.<br>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Retrieve current inventory
$sql_select = "SELECT * FROM computer";
$result = $conn->query($sql_select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update Inventory</title>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <style>
        .container {
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
        .thead th {
            background-color: burlywood;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../../../adminhome.php">Home</a>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="../includes/add.php" method="post">
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
                    <div class="form-group">
                        <label for="dept_id">Department:</label>
                        <select class="form-control" id="dept_id" name="dept_id">
                            <option value="1">AET Department</option>
                            <option value="2">BT Department</option>
                            <option value="3">CSE Department</option>
                            <option value="4">ECE Department</option>
                            <option value="5">IT Department</option>
                        </select>
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
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>PC Number</th>
                        <th>Processor</th>
                        <th>RAM</th>
                        <th>Storage</th>
                        <th>Problem</th>
                        <th>QR Image</th>
                        <th>Dept ID</th>
                        <th>Actions</th>
                        <th>Print</th>
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
                            echo "<td>" . $row["dept_id"] . "</td>";
                            echo "<td><img src='" . $row["qr_img"] . "' alt='QR Image' width='100' height='100'></td>";                            
                            
                            echo "<td><button onclick='printQR(\"" . $row["qr_img"] . "\")'>Print</button></td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No inventory found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="container">
        <button onclick="window.print()" class="btn btn-primary mt-3 btn-block">Print</button>
    </div>
    <script>
        function printQR(qrImgUrl) {
            var printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write('<html><head><title>QR Image</title></head><body>');
            printWindow.document.write('<img src="' + qrImgUrl + '" alt="QR Image" width="300" height="300">');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>

</body>
</html>

<?php
$conn->close();
?>
