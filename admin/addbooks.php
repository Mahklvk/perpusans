<?php
require "config/session.php";
require "config/conn.php";

function generatorRandom($length = 10){
    $characters ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for($i = 0; $i < $length; $i++){
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Add Book</title>
</head>
<body>
    <?php require 'config/navbar.php'; ?>

    <div class="container mt-5">
        <h3 class="text-center">Add New Book</h3>
        <div class="col-md-6 offset-md-3 shadow p-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" id="category" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="download_link" class="form-label">Download Link</label>
                    <input type="text" name="download_link" id="download_link" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>

                <button type="submit" name="add" class="btn btn-primary">Add Book</button>
            </form>

            <?php
            if (isset($_POST['add'])) {
                $title = htmlspecialchars($_POST['title']);
                $author = htmlspecialchars($_POST['author']);
                $category = htmlspecialchars($_POST['category']);
                $description = htmlspecialchars($_POST['description']);
                $download_link = htmlspecialchars($_POST['download_link']);

                $target_dir = "../assets/storage/";
                $image_name = basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $image_name;
                $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["image"]["size"];
                $random_name = generatorRandom(20);
                $new_image_name = $random_name . "." . $file_type;

                if ($image_size > 500000) {
                    echo "<script>Swal.fire({icon: 'warning', title: 'Oops...', text: 'File size should not exceed 500KB!'});</script>";
                } elseif (!in_array($file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo "<script>Swal.fire({icon: 'warning', title: 'Oops...', text: 'Invalid file type! Only JPG, JPEG, PNG, and GIF are allowed.'});</script>";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $new_image_name)) {
                        $queryAdd = mysqli_query($conn, "INSERT INTO books (title, author, category, description, download_link, image) VALUES ('$title', '$author', '$category', '$description', '$download_link', '$new_image_name')");

                        if ($queryAdd) {
                            echo "<script>Swal.fire({icon: 'success', title: 'Success', text: 'Book added successfully!'}).then(() => {window.location.href = 'books.php';});</script>";
                        } else {
                            echo "<script>Swal.fire({icon: 'error', title: 'Error', text: 'Failed to add book: " . mysqli_error($conn) . "'});</script>";
                        }
                    } else {
                        echo "<script>Swal.fire({icon: 'error', title: 'Error', text: 'Failed to upload image!'});</script>";
                    }
                }
            }
            ?>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
</body>
</html>
