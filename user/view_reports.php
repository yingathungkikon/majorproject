<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include('../connection/connect.php');

// Fetch all reports
$sql = "SELECT * FROM reports";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <img src="image/logo.png" alt="logo" style="width:70px" class="rounded-pill">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Department
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="admin/aetdept/home.php">AGRI Department </a></li>
                                <li><a class="dropdown-item" href="admin/btdept/home.php">BIOTECH Department </a></li>
                                <li><a class="dropdown-item" href="admin/csedept/home.php">CSE Department </a></li>
                                <li><a class="dropdown-item" href="admin/ecedept/home.php">ECE Department </a></li>
                                <li><a class="dropdown-item" href="admin/itdept/home.php">IT Department </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h1>View Reports</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>PC Number</th>
                    <th>Report Message</th>
                    <th>Reported By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['pc_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['report_message']); ?></td>
                    <td><?php echo htmlspecialchars($row['reported_by']); ?></td>
                    <td>
                        <a href="view_report_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                        <a href="delete_report.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
