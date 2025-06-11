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

// Validasi pendonatur
$cek = $conn->prepare("SELECT id, nama FROM pendonatur WHERE id = ?");
$cek->bind_param("i", $pendonatur_id);
$cek->execute();
$hasil = $cek->get_result();

if ($hasil->num_rows === 0) {
    die("<div style='color: red;'>❌ Gagal: ID Pendonatur tidak ditemukan.</div>");
}

$data = $hasil->fetch_assoc();
$nama_pendonatur = $data['nama'];
$cek->close();

// Simpan donasi
$stmt = $conn->prepare("INSERT INTO donasi (pendonatur_id, jumlah, pesan, tanggal_donasi) VALUES (?, ?, ?, ?)");
$stmt->bind_param("idss", $pendonatur_id, $jumlah, $pesan, $tanggal_donasi);

$donasi_berhasil = false;
$id_donasi = null;

if ($stmt->execute()) {
    $donasi_berhasil = true;
    $id_donasi = $stmt->insert_id;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Donasi Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <?php if ($donasi_berhasil): ?>
          <div class="alert alert-success text-center shadow-sm rounded">
            <h4 class="alert-heading">🎉 Donasi Berhasil!</h4>
            <p>Terima kasih <strong><?= htmlspecialchars($nama_pendonatur); ?></strong> atas donasi Anda sebesar <strong>Rp<?= number_format($jumlah, 0, ',', '.'); ?></strong>.</p>
            <hr>
            <p class="mb-0">ID Donasi Anda: <code><?= $id_donasi; ?></code></p>
            <a href="../pw2025_tubes_243040019/tubes/index.php" class="btn btn-success mt-3">Kembali ke Beranda</a>
          </div>
        <?php else: ?>
          <div class="alert alert-danger text-center shadow-sm rounded">
            <h4 class="alert-heading">❌ Gagal Menyimpan Donasi</h4>
            <p>Silakan coba lagi atau hubungi admin.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

</body>
</html>
