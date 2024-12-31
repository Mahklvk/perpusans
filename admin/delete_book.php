<?php
require "config/session.php";
require "config/conn.php";

// Set header agar menerima JSON
header('Content-Type: application/json');

try {
    // Membaca input dari permintaan POST
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['book_id']) || empty($input['book_id'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Book ID is missing or invalid.',
        ]);
        exit;
    }

    $book_id = intval($input['book_id']);

    // Query untuk mendapatkan informasi file gambar
    $queryGetBook = mysqli_query($conn, "SELECT image FROM books WHERE book_id = $book_id");
    if (mysqli_num_rows($queryGetBook) === 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Book not found.',
        ]);
        exit;
    }

    $book = mysqli_fetch_assoc($queryGetBook);
    $imagePath = "../assets/storage/" . $book['image'];

    // Hapus data dari database
    $queryDelete = mysqli_query($conn, "DELETE FROM books WHERE book_id = $book_id");

    if (!$queryDelete) {
        throw new Exception("Failed to delete book from database: " . mysqli_error($conn));
    }

    // Hapus file gambar jika ada
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Berikan respons sukses
    echo json_encode([
        'success' => true,
        'message' => 'Book deleted successfully.',
    ]);
} catch (Exception $e) {
    // Tangani error
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage(),
    ]);
}
