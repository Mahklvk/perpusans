<?php
require "config/session.php";
require "config/conn.php";

$id = $_GET['p'];
$query = mysqli_query($conn, "SELECT * FROM books WHERE book_id='$id'");
$data = mysqli_fetch_array($query);

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
    <title>Edit Book</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php require "config/navbar.php"?>

    <div class="container mt-5">
        <h3 class="text-center">Edit Book</h3>
        <div class="col-md-6 offset-md-3 shadow p-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" value="<?php echo $data['title']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" value="<?php echo $data['author']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" id="category" value="<?php echo $data['category']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4"><?php echo $data['description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="download_link" class="form-label">Download Link</label>
                    <input type="text" name="download_link" id="download_link" value="<?php echo $data['download_link']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="currentImage" class="form-label">Current Image</label>
                    <img src="../assets/storage/<?php echo $data['image']; ?>" alt="Book Image" class="img-fluid d-block mb-2" style="max-height: 200px;">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>

            <?php
            if (isset($_POST['update'])) {
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $author = mysqli_real_escape_string($conn, $_POST['author']);
                $category = mysqli_real_escape_string($conn, $_POST['category']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $download_link = mysqli_real_escape_string($conn, $_POST['download_link']);

                $target_dir = "../assets/storage/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $image_size = $_FILES["image"]["size"];
    $random_name = generatorRandom(20);
    $new_image_name = $random_name . "." . $file_type;

                if ($image_name != '') {
                    if ($image_size > 500000) {
                        echo '<div class="alert alert-warning mt-3">File size should not exceed 500KB.</div>';
                    } elseif (!in_array($file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
                        echo '<div class="alert alert-warning mt-3">Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.</div>';
                    } else {
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $new_image_name)) {
                            if (!empty($data['image']) && file_exists($target_dir . $data['image'])) {
                                unlink($target_dir . $data['image']); // Delete old image
                            }
                            $queryUpdate = mysqli_query($conn, "UPDATE books SET title='$title', author='$author', category='$category', description='$description', download_link='$download_link', image='$new_image_name' WHERE book_id='$id'");
                        }
                    }
                } else {
                    $queryUpdate = mysqli_query($conn, "UPDATE books SET title='$title', author='$author', category='$category', description='$description', download_link='$download_link' WHERE book_id='$id'");
                }

                if ($queryUpdate) {
                    echo '<div class="alert alert-success mt-3">Book updated successfully!</div>';
                    echo '<meta http-equiv="refresh" content="2; url=books.php">';
                } else {
                    echo '<div class="alert alert-danger mt-3">Failed to update book: ' . mysqli_error($conn) . '</div>';
                }
            }
            ?>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>
</html>
