<?php
require "admin/config/conn.php"; // Koneksi ke database

// Query untuk mengambil semua data dari tabel books
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
    <h1 class="text-center mb-4">Books List</h1>
    <div class="row">
        <?php
        // Cek apakah ada data di tabel books
        if ($jumlahBooks == 0) {
            echo '<h3 class="text-center">Tidak ada Buku</h3>';
        } else {
            // Iterasi setiap data dari query
            while($getData = mysqli_fetch_array($queryGetBooks)) {
            ?>
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <!-- Menampilkan gambar -->
                            <img src="assets/storage/<?php echo $getData['image']; ?>" class="img-fluid rounded-start" alt="<?php echo htmlspecialchars($getData['title']); ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <!-- Menampilkan data -->
                                <h5 class="card-title"><?php echo htmlspecialchars($getData['title']); ?></h5>
                                <p class="card-text">Author: <?php echo htmlspecialchars($getData['author']); ?></p>
                                <p class="card-text">Category: <?php echo htmlspecialchars($getData['category']); ?></p>
                                <p class="card-text">
                                    <?php 
                                    echo strlen($getData['description']) > 100 
                                        ? htmlspecialchars(substr($getData['description'], 0, 100)) . '...' 
                                        : htmlspecialchars($getData['description']); 
                                    ?>
                                </p>
                                <p class="card-text"><small class="text-body-secondary">Created At: <?php echo htmlspecialchars($getData['created_at']); ?></small></p>

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
<script src="assets/fontawesome/js/all.min.js"></script>
</body>
</html>
