<?php
include 'koneksi.php';

$sql = "SELECT * FROM warung_sate";
$result = $conn->query($sql);
if ($result === false) {
    die("Error pada query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Daftar Bank Dan ATM</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Daftar Bank Dan ATM</h1>
    <?php include 'menu.php'; ?>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jam Buka</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                    <td><?php echo htmlspecialchars($row['jam_buka']); ?></td>
                    <td><?php echo htmlspecialchars($row['latitude']); ?></td>
                    <td><?php echo htmlspecialchars($row['longitude']); ?></td>
                    <td><img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar Warung" width="100"></td>
                    <td>
                        <a href="detail.php?id=<?php echo $row['id']; ?>">Detail</a> |
                        <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="7">Tidak ada data bank.</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
