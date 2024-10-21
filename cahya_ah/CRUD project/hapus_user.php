<?php
// Menghubungkan ke database
include 'SqlConnection.php';

// Mendapatkan parameter 'id' dari URL
if (isset($_GET['id_user'])) {
    $id = $_GET['id_user'];

    // Query untuk menghapus data berdasarkan ID pengguna
    $query = "DELETE FROM user WHERE id_user='$id'";

    // Menjalankan query
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Mengalihkan kembali ke halaman utama setelah penghapusan
        header("Location: tampil_data.php");
    } else {
        // Menampilkan pesan error jika terjadi kesalahan
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "ID tidak diberikan!";
}
?>
