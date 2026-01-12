<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Daftar Bank dan ATM</title>
</head>
<body>
    <h1>Daftar Bank dan ATM</h1>
    <nav>
        <a href="index.php">Home</a> | 
        <a href="peta.php">Peta</a> | 
        <a href="tambah_daftar.php">Tambah Daftar</a> | 
        <a href="about.php">About</a>
    </nav>
    <table border="1" cellpadding="10">
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jam Buka</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Detail</th>
        </tr>
        <?php
        $sql = "SELECT id, nama, alamat, jam_buka, latitude, longitude, gambar FROM warung_sate";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar Warung" width="100"></td>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td><?php echo htmlspecialchars($row['alamat']); ?></td>
            <td><?php echo htmlspecialchars($row['jam_buka']); ?></td>
            <td><?php echo htmlspecialchars($row['latitude']); ?></td>
            <td><?php echo htmlspecialchars($row['longitude']); ?></td>
            <td><a href="detail.php?id=<?php echo $row['id']; ?>">Lihat Detail</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
