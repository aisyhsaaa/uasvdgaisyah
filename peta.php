<?php
include 'koneksi.php';

// Ambil data warung dari database
$sql = "SELECT id, nama, alamat, latitude, longitude FROM warung_sate";
$result = $conn->query($sql);
$warungData = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $warungData[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Peta Warung</title>
    <!-- Link ke Leaflet.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Peta Lokasi Warung</h1>
    <?php include 'menu.php'; ?>

    <!-- Elemen Peta -->
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Membuat peta dan menetapkan posisi awal serta zoom level
        var map = L.map('map').setView([0, 0], 2);  // Koordinat default [0,0] untuk pusat peta

        // Menambahkan peta OpenStreetMap ke dalam peta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Data warung dari PHP (hasil query database)
        var warungData = <?php echo json_encode($warungData); ?>;

        // Menambahkan penanda untuk setiap warung
        warungData.forEach(function(warung) {
            var lat = warung.latitude;
            var lng = warung.longitude;
            var nama = warung.nama;
            var alamat = warung.alamat;
            var id = warung.id;

            // Menambahkan marker pada peta
            var marker = L.marker([lat, lng]).addTo(map);

            // Menambahkan popup yang menampilkan nama dan alamat warung
            marker.bindPopup("<b>" + nama + "</b><br>" + alamat + "<br><a href='detail.php?id=" + id + "'>Lihat Detail</a>");
        });

        // Menyesuaikan zoom level peta sesuai dengan lokasi penanda
        if (warungData.length > 0) {
            map.setView([warungData[0].latitude, warungData[0].longitude], 12);
        }
    </script>
</body>
</html>
