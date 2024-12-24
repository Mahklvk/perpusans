<?php
require ('admin/config/conn.php');

// Folder penyimpanan gambar
$targetDir = "assets/images/";

// Ambil data dari database
$queryGetBooks = mysqli_query($conn, "SELECT * FROM books");
while ($book = mysqli_fetch_array($queryGetBooks)) {
    $imageData = $book['image_blob']; // Ambil gambar dalam bentuk blob
    $originalName = $book['image_name']; // Nama asli gambar dari database

    // Acak nama file
    $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);
    $newFileName = uniqid('book_', true) . '.' . $fileExtension;

    // Tentukan path lengkap
    $targetFilePath = $targetDir . $newFileName;

    // Simpan gambar ke folder lokal
    if (file_put_contents($targetFilePath, $imageData)) {
        // Update nama file di database
        mysqli_query($conn, "UPDATE books SET image_name = '$newFileName' WHERE book_id = {$book['book_id']}");
    }
}

$queryGetBooks = mysqli_query($conn, "SELECT * FROM books");
$jumlahBooks = mysqli_num_rows($queryGetBooks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
    <title>Books</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
    <?php include('config/navbar.php')?>

    <div class="container mt-3">
        <div class="row">
            <?php
            if ($jumlahBooks == 0) {
                echo '<h1 class="text-center">Tidak ada Topic</h1>';
            } else {
                while($getData = mysqli_fetch_array($queryGetBooks)) {
                ?>
                <div class="col-lg-6 col-md-12 mb-3">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/images/<?php echo $getData['image']; ?>" class="img-fluid rounded-start" alt="<?php echo $getData['title']; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $getData['title']; ?></h5>
                                    <p class="card-text">Author: <?php echo $getData['author']; ?></p>
                                    <p class="card-text">Category: <?php echo $getData['category']; ?></p>
                                    <p class="card-text">
                                        <?php echo strlen($getData['description']) > 100 ? substr($getData['description'], 0, 100) . '...' : $getData['description']; ?>
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Created At: <?php echo $getData['created_at']; ?></small></p>
                                    <!-- tombol detail -->
                                    <form method="post" action="topic_detail.php?p=<?php echo $getData['book_id']?>">
                                        <button type="submit" name="action" value="Detail"
                                            class="btn btn-primary btn-sm">Detail</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
            ?>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/assets/fontawesome/js/all.min.js"></script>
</body>
</html>
