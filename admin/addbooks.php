<?php
require('config/session.php');
require('config/conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include('config/navbar.php')?>
    <form action="addbookprocess.php" method="POST" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required><br><br>

    <label for="author">Author:</label>
    <input type="text" name="author" id="author" required><br><br>

    <label for="category">Category:</label>
    <input type="text" name="category" id="category" required><br><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea><br><br>

    <label for="image">Choose Image:</label>
    <input type="file" name="image" id="image" accept="image/*" required><br><br>

    <button type="submit" name="upload">Upload</button>
</form>


<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
</body>
</html>