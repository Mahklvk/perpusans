<?php
require('config/session.php');
require('config/conn.php');

$queryGetReport = mysqli_query($conn, "SELECT * FROM download_logs");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>Admin Logs</title>
</head>
<body>
    <?php include('config/navbar.php') ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Download Logs</h1>
        <div class="row">
            <?php if ($queryGetReport && mysqli_num_rows($queryGetReport) > 0): ?>
                <?php while ($data = mysqli_fetch_assoc($queryGetReport)): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <h5 class="card-title">Log ID: <strong><?php echo $data['log_id']; ?></strong></h5>
                                <p class="card-text"><strong>Admin ID:</strong> <?php echo $data['user_id']; ?></p>
                                <p class="card-text"><strong>Action:</strong> <?php echo $data['book_id']; ?></p>
                                <p class="card-text"><strong>Time:</strong> <?php echo $data['download_time']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-warning text-center" role="alert">
                    No logs found.
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>
</html>
