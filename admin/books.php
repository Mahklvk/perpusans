<?php
require ('config/session.php');
require('config/conn.php');

$queryGetBooks = mysqli_query($conn, "SELECT * FROM books");
$jumlahBooks = mysqli_num_rows($queryGetBooks);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>Books</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .button-add{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include('config/navbar.php')?>

    <div class="container mt-3">
        <div class="">
            <h1 class="text-center">List Books</h1>
                <button type="button" class="btn btn-primary button-add col-12">Add Book</button>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Link</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($jumlahBooks == 0){
                            ?>
                            <tr>
                                <td colspan="5" class="text-center">Data Buku Tidak ada</td>
                            </tr>
<?php
                        }else{
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($queryGetBooks)){
                                ?>
                                <tr>
                                    <td><?php echo $jumlah;?></td>
                                    <td><?php echo $data['title']?></td>
                                    <td><?php echo $data['author']?></td>
                                    <td><?php echo $data['category']?></td>
                                    <td><?php echo $data['created_at']?></td>
                                    <td><?php 
                                    echo strlen($data['download_link']) > 25
                                        ? htmlspecialchars(substr($data['download_link'], 0, 25)) . '...' 
                                        : htmlspecialchars($data['download_link']); 
                                    ?></td>
                                    <td><?php echo $data['image']?></td>
                                    <td>
                                        <a href="useredit.php?p=<?php echo $data['book_id']; ?>">
                                            <div class="btn btn-primary">Edit</div>
                                        </a>
                                    </td>
                                    <td>
                                    <a href="userdelete.php?p=<?php echo $data['book_id']; ?>">
                                            <div class="btn btn-danger" >Delete</div>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $jumlah++;
                            }
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
</body>
</html>