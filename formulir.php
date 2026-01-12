<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jam_buka = $_POST['jam_buka'];
    $alamat = $_POST['alamat'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $gambar = $_POST['gambar']; // Asumsi input URL gambar langsung

    $sql = "INSERT INTO warung (nama, jam_buka, alamat, latitude, longitude, gambar) 
            VALUES ('$nama', '$jam_buka', '$alamat', '$latitude', '$longitude', '$gambar')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css">
<head>
    <title>Tambah Daftar Bank Atau ATM</title>
</head>
<body>
    <h1>Tambah Daftar Bank Atau ATM</h1>
    <form method="post">
        <label>Nama Bank atau ATM :</label><br>
        <input type="text" name="nama" required><br>
        <label>Jam Buka:</label><br>
        <input type="text" name="jam_buka" required><br>
        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br>
        <label>Latitude:</label><br>
        <input type="text" name="latitude" required><br>
        <label>Longitude:</label><br>
        <input type="text" name="longitude" required><br>
        <label>URL Gambar:</label><br>
        <input type="text" name="gambar" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
