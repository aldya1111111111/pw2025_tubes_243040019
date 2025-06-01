<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan server Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "pw2025_tubes_243040019"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$target_dana = $_POST['target_dana'];
$dana_terkumpul = $_POST['dana_terkumpul'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$status = $_POST['status'];
$dibuat_pada = date('Y-m-d H:i:s'); // waktu server

// // Pastikan pendonatur_id diterima dan valid
// if (isset($_POST['pendonatur_id']) && is_numeric($_POST['pendonatur_id'])) {
//     $pendonatur_id = intval($_POST['pendonatur_id']);
// } else {
//     die("Error: pendonatur_id harus diisi dan valid.");
// }

// Proses upload gambar jika ada
$gambar = '';
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        die("Error: Gagal mengunggah gambar.");
    }
    $gambar = basename($_FILES["gambar"]["name"]);
}

// Siapkan dan bind param
$stmt = $conn->prepare("INSERT INTO kampanye (judul, deskripsi, target_dana, dana_terkumpul, tanggal_mulai, tanggal_selesai, status, gambar, dibuat_pada) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssddsssss", $judul, $deskripsi, $target_dana, $dana_terkumpul, $tanggal_mulai, $tanggal_selesai, $status, $gambar, $dibuat_pada);

// Eksekusi insert
if ($stmt->execute()) {
    echo "Kampanye berhasil ditambahkan!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

