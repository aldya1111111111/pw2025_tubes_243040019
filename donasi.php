<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2025_tubes_243040019";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$pendonatur_id = $_POST['pendonatur_id'];
$jumlah = $_POST['jumlah'];
$pesan = $_POST['pesan'];
$tanggal_donasi = $_POST['tanggal_donasi'];

// Validasi ID pendonatur
$cek = $conn->prepare("SELECT nama FROM pendonatur WHERE id = ?");
$cek->bind_param("i", $pendonatur_id);
$cek->execute();
$cek->bind_result($nama_pendonatur);
$cek->fetch();
$cek->close();

if (!$nama_pendonatur) {
    die("Error: ID Pendonatur tidak ditemukan.");
}

// Simpan ke tabel donasi
$stmt = $conn->prepare("INSERT INTO donasi (pendonatur_id, jumlah, pesan, tanggal_donasi) VALUES (?, ?, ?, ?)");
$stmt->bind_param("idss", $pendonatur_id, $jumlah, $pesan, $tanggal_donasi);

if ($stmt->execute()) {
    $pesan_berhasil = "Donasi berhasil disimpan!";
    $donasi_id = $stmt->insert_id; // ambil ID donasi terakhir
} else {
    die("Error saat menyimpan donasi: " . $stmt->error);
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $pesan_berhasil; ?></h1>
        <p><strong>Nama Pendonatur:</strong> <?= htmlspecialchars($nama_pendonatur); ?></p>
        <p><strong>Jumlah Donasi:</strong> Rp<?= number_format($jumlah, 0, ',', '.'); ?></p>
        <p><strong>Pesan:</strong> <?= htmlspecialchars($pesan); ?></p>
        <p><strong>Tanggal:</strong> <?= htmlspecialchars($tanggal_donasi); ?></p>
    </div>
</body>
</html>
