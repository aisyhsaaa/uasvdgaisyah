<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM warung_sate WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $warung = $result->fetch_assoc();
    } else {
        die("Data tidak ditemukan.");
    }
} else {
    die("Data tidak valid.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Detail Lanjutan</title>
</head>
<body>
    <h1>Detail Lanjutan</h1>
    <?php include 'menu.php'; ?>
    <p><strong>Nama:</strong> <?php echo htmlspecialchars($warung['nama']); ?></p>
    <p><strong>Alamat:</strong> <?php echo htmlspecialchars($warung['alamat']); ?></p>
    <p><strong>Jam Buka:</strong> <?php echo htmlspecialchars($warung['jam_buka']); ?></p>
    <p><strong>Latitude:</strong> <?php echo htmlspecialchars($warung['latitude']); ?></p>
    <p><strong>Longitude:</strong> <?php echo htmlspecialchars($warung['longitude']); ?></p>
    <p><strong>Gambar:</strong></p>
    <img src="uploads/<?php echo htmlspecialchars($warung['gambar']); ?>" alt="Gambar Warung" width="300">
</body>
</html>
