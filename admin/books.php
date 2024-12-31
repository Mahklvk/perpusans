<?php
require "config/session.php";
require "config/conn.php";

$query = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Books</title>
</head>
<body>


    <div class="container mt-5">
        <h3 class="text-center">Books</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['author']; ?></td>
                    <td><?php echo $data['category']; ?></td>
                    <td><?php echo strlen($data['description']) > 50 ? substr($data['description'], 0, 50) . '...' : $data['description']; ?></td>
                    <td>
                        <a href="bookdetail.php?p=<?php echo $data['book_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteBook(<?php echo $data['book_id']; ?>)">Delete</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteBook(bookId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('delete_book.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ book_id: bookId }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Deleted!',
                                'The book has been deleted.',
                                'success'
                            ).then(() => location.reload());
                        } else {
                            Swal.fire(
                                'Error!',
                                data.message || 'Failed to delete the book.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'An error occurred while processing the request.',
                            'error'
                        );
                    });
                }
            });
        }
    </script>

    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
