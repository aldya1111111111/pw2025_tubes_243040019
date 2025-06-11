<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2025_tubes_243040019";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$tampil_kembali = false; // default

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $target_dana = $_POST["target_dana"];
    $tanggal_mulai = $_POST["tanggal_mulai"];
    $tanggal_selesai = $_POST["tanggal_selesai"];
    $status = $_POST["status"];
    $dibuat_pada = date("Y-m-d H:i:s");
    $gambar = "";

    // Validasi tanggal dan dana
    if (strtotime($tanggal_mulai) > strtotime($tanggal_selesai)) {
        echo "<script>alert('Tanggal mulai tidak boleh setelah tanggal selesai.');</script>";
    } elseif ($target_dana < 1000000) {
        echo "<script>alert('Minimal target dana adalah Rp 1.000.000.');</script>";
    } else {
        // Upload gambar
        if (!empty($_FILES["gambar"]["name"])) {
            $upload_dir = "uploads/";
            $gambar_name = basename($_FILES["gambar"]["name"]);
            $target_path = $upload_dir . $gambar_name;
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_path)) {
                $gambar = $gambar_name;
            }
        }

        // Insert kampanye
        $sql = "INSERT INTO kampanye 
        (judul, deskripsi, target_dana, dana_terkumpul, tanggal_mulai, tanggal_selesai, status, gambar, dibuat_pada) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $dana_terkumpul = 0;
        $stmt->bind_param("ssiisssss", $judul, $deskripsi, $target_dana, $dana_terkumpul, $tanggal_mulai, $tanggal_selesai, $status, $gambar, $dibuat_pada);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Kampanye berhasil ditambahkan!');</script>";
        $tampil_kembali = true;
    }
}

$sql = "SELECT * FROM kampanye ORDER BY dibuat_pada DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kampanye</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <?php if ($tampil_kembali): ?>
    <div class="text-center">
      <h4 class="text-success"></h4>
      <a href="/pw2025_tubes_243040019/tubes/index.php" class="btn btn-success mt-3">Kembali ke Beranda</a>
    </div>
  <?php else: ?>
    <p class="text-center text-muted">Silakan isi form kampanye terlebih dahulu.</p>
  <?php endif; ?>
</div>
</body>
</html>
