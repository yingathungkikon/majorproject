<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Device</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Report Device</h1>
        <?php if (isset($_SESSION["success_message"])) : ?>
            <div class="alert alert-success"><?php echo $_SESSION["success_message"]; ?></div>
            <?php unset($_SESSION["success_message"]); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION["error_message"])) : ?>
            <div class="alert alert-danger"><?php echo $_SESSION["error_message"]; ?></div>
            <?php unset($_SESSION["error_message"]); ?>
        <?php endif; ?>
        <form method="post" action="report_device.php">
            <div class="mb-3">
                <label for="pc_number" class="form-label">PC Number</label>
                <input type="text" class="form-control" id="pc_number" name="pc_number" required>
            </div>
            <div class="mb-3">
                <label for="report_message" class="form-label">Report Message</label>
                <textarea class="form-control" id="report_message" name="reportMessage" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Report</button>
        </form>
    </div>
</body>
</html>
