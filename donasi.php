<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2025_tubes_243040019";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$pendonatur_id = $_POST['pendonatur_id'];
$jumlah = $_POST['jumlah'];
$pesan = $_POST['pesan'];
$tanggal_donasi = $_POST['tanggal_donasi'];

// Cek apakah ID pendonatur valid
$cek = $conn->prepare("SELECT id FROM pendonatur WHERE id = ?");
$cek->bind_param("i", $pendonatur_id);
$cek->execute();
$hasil = $cek->get_result();

if ($hasil->num_rows === 0) {
    die("❌ Gagal: ID Pendonatur tidak ditemukan.");
}
$cek->close();

// Simpan ke tabel donasi
$stmt = $conn->prepare("INSERT INTO donasi (pendonatur_id, jumlah, pesan, tanggal_donasi) VALUES (?, ?, ?, ?)");
$stmt->bind_param("idss", $pendonatur_id, $jumlah, $pesan, $tanggal_donasi);

if ($stmt->execute()) {
    echo "Donasi berhasil ditambahkan. ID Donasi: " . $stmt->insert_id;
} else {
    echo "❌ Gagal menyimpan donasi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
