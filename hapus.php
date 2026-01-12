<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data warung berdasarkan id
    $sql = "DELETE FROM warung_sate WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
        // Redirect ke halaman daftar penjual martabak setelah berhasil dihapus
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
