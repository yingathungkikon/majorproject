<?php
    session_start();
    include('../../../../connection/connect.php');
    $sql = "SELECT * FROM itcomputers";
    $result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Inventory</title>
    <link rel="icon" type="image/x-icon" href="../../../logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
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
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../../../logo.png" alt="logo" style="width:70px" class="rounded-pill">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-info" href="../../../../userhome.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-info" href="../../userhome.php">Back</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h3 class="mt-4 mb-3 text-center text-success">IT Computer Inventory</h3>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>DEPT ID</th>
                        <th>DEVICE NAME</th>
                        <th>BRAND</th>
                        <th>PC NUMBER</th>
                        <th>PROCESSOR</th>
                        <th>RAM</th>
                        <th>SYSTEM TYPE</th>
                        <th>PEN TOUCH</th>
                        <th>PROBLEM</th>
                        <th>REPORT</th>
                        <th>QR IMG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["dept_id"] . "</td>";
                            echo "<td>" . $row["device_name"] . "</td>";
                            echo "<td>" . $row["brand"] . "</td>";
                            echo "<td>" . $row["pc_number"] . "</td>";
                            echo "<td>" . $row["processor"] . "</td>";
                            echo "<td>" . $row["ram"] . "</td>";
                            echo "<td>" . $row["system_type"] . "</td>";
                            echo "<td>" . $row["pen_touch"] . "</td>";
                            echo "<td id='problem-" . $row["id"] . "'>" . $row["problem"] . "</td>";
                            echo "<td><button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#reportModal' data-id='" . $row["id"] . "'>Report</button></td>";
                            echo "<td><img src='" . $row["qr_img"] . "' alt='QR Code' style='width:120px;height:120px;'></td>";

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
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reportForm">
                        <input type="hidden" id="computerId" name="computerId">
                        <div class="mb-3">
                            <label for="reportDetails" class="form-label">Details</label>
                            <textarea class="form-control" id="reportDetails" name="reportDetails" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var reportModal = document.getElementById('reportModal');
            reportModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var computerId = button.getAttribute('data-id');
                var modalBodyInput = reportModal.querySelector('#computerId');
                modalBodyInput.value = computerId;
            });

            document.getElementById('reportForm').addEventListener('submit', function (event) {
                event.preventDefault();
                var computerId = document.getElementById('computerId').value;
                var reportDetails = document.getElementById('reportDetails').value;

                $.ajax({
                    url: 'includes/updateuserview.php',
                    type: 'POST',
                    data: {
                        computerId: computerId,
                        reportDetails: reportDetails
                    },
                    success: function (response) {
                        var res = JSON.parse(response);
                        if (res.status === 'success') {
                            $('#problem-' + computerId).text(reportDetails);
                            alert('Report submitted successfully.');
                        } else {
                            alert('Error: ' + res.message);
                        }
                        var modal = bootstrap.Modal.getInstance(reportModal);
                        modal.hide();
                    },
                    error: function () {
                        alert('An error occurred while submitting the report.');
                    }
                });
            });
        });
    </script>
</body>
</html>

</html>
