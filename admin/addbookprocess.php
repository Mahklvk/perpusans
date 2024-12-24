<?php
require('admin/config/conn.php');

if (isset($_POST['upload'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Proses gambar
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    // Validasi tipe file
    $allowed = ['jpg', 'jpeg', 'png'];
    $fileExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    if (in_array($fileExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize <= 2000000) { // Maksimum ukuran 2MB
                // Acak nama file
                $newImageName = uniqid('book_', true) . "." . $fileExt;
                $targetDir = "assets/images/" . $newImageName;

                // Pindahkan file ke folder tujuan
                if (move_uploaded_file($imageTmpName, $targetDir)) {
                    // Simpan ke database
                    $sql = "INSERT INTO books (title, author, category, description, image_name) 
                            VALUES ('$title', '$author', '$category', '$description', '$newImageName')";

                    if (mysqli_query($conn, $sql)) {
                        echo "Data berhasil disimpan.";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "Gagal mengupload file.";
                }
            } else {
                echo "Ukuran file terlalu besar.";
            }
        } else {
            echo "Ada error pada file.";
        }
    } else {
        echo "Tipe file tidak diizinkan.";
    }
}
?>