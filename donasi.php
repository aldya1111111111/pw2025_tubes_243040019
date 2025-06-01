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
$cek = $conn->prepare("SELECT id FROM pendonatur WHERE id = ?");
$cek->bind_param("i", $pendonatur_id);
$cek->execute();
$cek->store_result();
if ($cek->num_rows === 0) {
    die("Error: ID Pendonatur tidak ditemukan.");
}
$cek->close();

// Siapkan query insert donasi
$stmt = $conn->prepare("INSERT INTO donasi (pendonatur_id, jumlah, pesan, tanggal_donasi) VALUES (?, ?, ?, ?)");
$stmt->bind_param("idss", $pendonatur_id, $jumlah, $pesan, $tanggal_donasi);

if ($stmt->execute()) {
    echo "Donasi berhasil disimpan!";
} else {
    echo "Error saat menyimpan donasi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
