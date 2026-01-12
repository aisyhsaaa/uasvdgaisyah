<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jam_buka = $_POST['jam_buka'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Pengaturan folder upload
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Buat folder dengan izin penuh (0777)
    }

    // Mengunggah gambar
    $gambar = $_FILES['gambar']['name'];
    $target_file = $target_dir . basename($gambar);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        // Menyimpan data ke database
        $sql = "INSERT INTO warung_sate (nama, alamat, jam_buka, latitude, longitude, gambar)
                VALUES ('$nama', '$alamat', '$jam_buka', '$latitude', '$longitude', '$gambar')";

        if ($conn->query($sql) === TRUE) {
            echo "Daftar berhasil ditambahkan!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah gambar. Pastikan file tidak melebihi batas ukuran atau format tidak didukung.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Daftar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Tambah Daftar</h1>
    <a href="index.php">Kembali ke Home</a>
    <form action="tambah_daftar.php" method="POST" enctype="multipart/form-data">
        <label>Nama: <input type="text" name="nama" required></label><br>
        <label>Alamat: <input type="text" name="alamat" required></label><br>
        <label>Jam Buka: <input type="text" name="jam_buka" required></label><br>
        <label>Latitude: <input type="text" name="latitude" required></label><br>
        <label>Longitude: <input type="text" name="longitude" required></label><br>
        <label>Gambar: <input type="file" name="gambar" required></label><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
