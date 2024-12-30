<?php
require "config/session.php";
require "config/conn.php";

$queryGetAdminAccount = mysqli_query($conn, "SELECT * FROM admins");
$jumlahAdmin = mysqli_num_rows($queryGetAdminAccount);
$queryBooks = mysqli_query($conn, "SELECT * FROM books");
$jumlahBooks = mysqli_num_rows($queryBooks);
$queryGetUser = mysqli_query($conn, "SELECT * FROM users");
$jumlahUser = mysqli_num_rows($queryGetUser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>index admin</title>
    <style>
        .icon-admin {
            justify-content: end;
            align-items: end;
            display: block;
            margin-left: 30vh;
            position: absolute;
        }

        .icon-book {
            justify-content: end;
            align-items: end;
            display: block;
            margin-left: 30vh;
            position: absolute;
        }

        .icon-user {
            justify-content: end;
            align-items: end;
            display: block;
            margin-left: 30vh;
            position: absolute;
        }

        .card {
            border-radius: 10px;
        }

        .summary-user {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-user:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }

        .summary-post {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-post:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }
        .summary-comment {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-comment:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }
        .summary-report {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-report:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }
        .summary-community {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-community:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }

        .no-decoration{
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <?php include('config/navbar.php');
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12 col-sm-12 mb-2">
                <a href="post.php" class="no-decoration">
                <div class="summary-user p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fas fa-user-tie fa-7x text-black-50 icon-admin"></i>
                        </div>

                        <div class="text-black" >
                            <h3 class="fs-2"><strong>Admin(s)</strong></h3>
                            <p class="fs-4">List admin(s): <?php echo $jumlahAdmin ?></p>
                            <p><a href="kategori.php" class="text-white nodeco">Lihat Kategori</a></p>
                        </div>
                    </div>
                </div>
            </a>
            </div>

            <div class="col-lg-4 col-md-12 col-12 col-sm-12 mb-2">
                <a href="post.php" class="no-decoration">
                <div class="summary-post p-3">
                    <div class="row">
                        <div class="col-6 ">
                            <i class="fas fa-book fa-7x text-black-50 icon-book"></i>
                        </div>

                        <div class="text-black">
                            <h3 class="fs-2"><strong>Book(s)</strong></h3>
                            <p class="fs-4">List Book(s): <?php echo $jumlahBooks ?></p>
                            <p><a href="produk.php" class="text-white nodeco">Lihat detail</a></p>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-12 col-12 col-sm-12 ">
                <a href="post.php" class="no-decoration">
                <div class="summary-comment p-3">
                    <div class="row">
                        <div class="col-6 ">
                            <i class="fas fa-user fa-7x text-black-50 icon-user"></i>
                        </div>

                        <div class="text-black">
                            <h3 class="fs-2"><strong>User(s)</strong></h3>
                            <p class="fs-4">List User(s): <?php echo $jumlahUser ?></p>
                            <p><a href="produk.php" class="text-white nodeco">Lihat detail</a></p>
                        </div>
                    </div>
                </div>
                </a>
            </div>





    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>

</html>