<?php
    session_start();
    include('../../../connection/connect.php');
    $sql = "SELECT * FROM btcomputers";
    $result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
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
                <a class="navbar-brand " href="#">
                    <img src="../../../logo.png" alt="logo" style="width:70px" class="rounded-pill">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <button type="button" class="btn btn-primary" id="openModalBtn">
                    Add New Computer  
                </button>
            </div>      
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Computer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../includes/add_computer.php" method="post">
                                <div class="mb-3">
                                    <label for="brand">BRAND:</label>
                                    <input type="text" class="form-control" id="brand" name="brand">
                                </div>
                                <div class="mb-3">
                                    <label for="model">MODEL:</label>
                                    <input type="text" class="form-control" id="model" name="model">
                                </div>
                                <div class="mb-3">
                                    <label for="pc_number">PC NUMBER:</label>
                                    <input type="text" class="form-control" id="pc_number" name="pc_number">
                                </div>
                                <div class="mb-3">
                                    <label for="processor">PROCESSOR:</label>
                                    <input type="text" class="form-control" id="processor" name="processor">
                                </div>
                                <div class="mb-3">
                                    <label for="ram">RAM:</label>
                                    <input type="text" class="form-control" id="ram" name="ram">
                                </div>
                                <div class="mb-3">
                                    <label for="storage">STORAGE:</label>
                                    <input type="text" class="form-control" id="storage" name="storage">
                                </div>
                                <div class="mb-3">
                                    <label for="problem">Problem:</label>
                                    <input type="text" class="form-control" id="problem" name="problem">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 btn-block">Add</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-info" href="../../../../adminhome.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-info" href="../../home.php">Back</a>
                    </li>
                </ul>
            </div>

        </nav>

    </header>

    <script>
        $(document).ready(function() {
            $('#openModalBtn').click(function() {
                $('#myModal').modal('show');
            });
        });
        $(document).ready(function() {
            $('#myModal').on('shown.bs.modal', function () {
                $('#brand').focus();
            });
        });
    </script>

    <div class="container mt-5">
        <h3 class="mt-4 mb-3 text-center text-success">Biotech Computer Inventory</h3>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>DEPT ID</th>
                        <th>BRAND</th>
                        <th>MODEL</th>
                        <th>PC NUMBER</th>
                        <th>PROCESSOR</th>
                        <th>RAM</th>
                        <th>STORAGE</th>
                        <th>PROBLEM</th>
                        <th>QR IMG</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["dept_id"] . "</td>";
                                    echo "<td>" . $row["brand"] . "</td>";
                                    echo "<td>" . $row["model"] . "</td>";
                                    echo "<td>" . $row["pc_number"] . "</td>";
                                    echo "<td>" . $row["processor"] . "</td>";
                                    echo "<td>" . $row["ram"] . "</td>";
                                    echo "<td>" . $row["storage"] . "</td>";
                                    echo "<td>" . $row["problem"] . "</td>";
                                    echo "<td><img src='" . $row["qr_img"] . "' alt='QR Code'></td>";
                                    echo "<td><button onclick='updateComputer(" . $row["id"] . ", \"" . $row["brand"] . "\", \"" . $row["model"] . "\", \"" . $row["pc_number"] . "\", \"" . $row["processor"] . "\", \"" . $row["ram"] . "\", \"" . $row["storage"] . "\", \"" . $row["problem"] . "\")' class='btn btn-primary'>Update</button>&nbsp;&nbsp;<a href='../includes/delete_computer.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>&nbsp;&nbsp;&nbsp;<button onclick='printQR(\"" . $row["qr_img"] . "\")' class='btn btn-success'>Print</button></td>";
             

                                echo "</tr>";
                                
                            }
                        } else {
                            echo "<tr><td colspan='10'>No inventory found</td></tr>";
                        }
                    ?>



                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateLabel">UPDATE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm" method="post">
                            <input type="hidden" id="updateId" name="id">
                            <div class="mb-3">
                                <label for="brand">Brand:</label>
                                <input type="text" class="form-control" id="updateBrand" name="brand">
                            </div>
                            <div class="mb-3">
                                <label for="model">Model:</label>
                                <input type="text" class="form-control" id="updateModel" name="model">
                            </div>
                            <div class="mb-3">
                                <label for="pc_number">PC Number:</label> 
                                <input type="text" class="form-control" id="updatePcNumber" name="pc_number"> 
                            </div>
                            <div class="mb-3">
                                <label for="processor">Processor:</label>
                                <input type="text" class="form-control" id="updateProcessor" name="processor">
                            </div>
                            <div class="mb-3">
                                <label for="ram">RAM:</label>
                                <input type="text" class="form-control" id="updateRam" name="ram">
                            </div>
                            <div class="mb-3">
                                <label for="storage">Storage:</label>
                                <input type="text" class="form-control" id="updateStorage" name="storage">
                            </div>
                            <div class="mb-3">
                                <label for="problem">Problem:</label>
                                <input type="text" class="form-control" id="updateProblem" name="problem">
                            </div>
                            <div id="updateSuccessMessage" class="alert alert-success" style="display: none;">
                                Successfully Updated
                            </div>

                            <button type="submit" class="btn mt-3 btn-primary btn-block">Update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateComputer(id, brand, model, pc_number, processor, ram, storage, problem) {
            $('#updateId').val(id);
            $('#updateBrand').val(brand);
            $('#updateModel').val(model);
            $('#updatePcNumber').val(pc_number);
            $('#updateProcessor').val(processor);
            $('#updateRam').val(ram);
            $('#updateStorage').val(storage);
            $('#updateProblem').val(problem);
            $('#updateModal').modal('show');
        }
        $(document).ready(function() {
        $('#updateForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            
            $.ajax({
                url: '../includes/update_computer.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    $('#updateSuccessMessage').show(); 
                    setTimeout(function() {
                        $('#updateSuccessMessage').hide(); 
                        $('#updateModal').modal('hide'); 
                    }, 5000);
                },  
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>


    <section class="footer">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </section>
    <section class="footer">
            <?php

                require '../../main/footer.php'
            ?>
    </section>

</body>

</html>
<script>
    function printQR(imageSrc) {
        var img = new Image();
        img.src = imageSrc;
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Print</title></head><body><img src="' + imageSrc + '"></body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
