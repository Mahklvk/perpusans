<?php
session_start();
require 'config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>Login Page</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Pindahkan ke sini -->
</head>
<style>
    .alert {
        width: 63vh;
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body p-5 shadow">
                        <h2 class="mb-4 text-center">Login</h2>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" type="submit" name="login">Login</button>
                            </div>
                        </form>
                        <div class="mt-3" style="width: 500px">
                            <?php
                            if (isset($_POST['login'])) {
                                // Mengambil input dari form login
                                $username = htmlspecialchars($_POST['email']);
                                $password = htmlspecialchars($_POST['password']);

                                // Memastikan koneksi ke database berhasil
                                if ($conn) {
                                    // Query untuk mencari username di database
                                    $query = "SELECT * FROM admins WHERE email = ?";
                                    $stmt = mysqli_prepare($conn, $query);
                                    mysqli_stmt_bind_param($stmt, "s", $username);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    // Mengecek apakah data ada
                                    if ($data = mysqli_fetch_array($result)) {
                                        // Memverifikasi password
                                        if ($password === $data['password']) {
                                            // Jika berhasil, buat session
                                            $_SESSION['email'] = $data['email'];
                                            $_SESSION['login'] = true;
                                            echo "<script>
                                                    Swal.fire({
                                                        title: 'Login Berhasil!',
                                                        text: 'Selamat datang, " . $data['username'] . "!',
                                                        icon: 'success'
                                                    }).then(() => {
                                                        window.location.href = '../admin/';
                                                    });
                                                  </script>";
                                        } else {
                                            echo '<script>
                                                    Swal.fire({
                                                        title: "Password Salah",
                                                        text: "Silakan coba lagi.",
                                                        icon: "error"
                                                    });
                                                  </script>';
                                        }
                                    } else {
                                        echo '<script>
                                                Swal.fire({
                                                    title: "Gagal Login",
                                                    text: "Username tidak ditemukan.",
                                                    icon: "error"
                                                });
                                              </script>';
                                    }

                                    // Menutup statement
                                    mysqli_stmt_close($stmt);
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Koneksi database gagal</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>

</html>