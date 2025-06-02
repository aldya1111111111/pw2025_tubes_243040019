<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2025_tubes_243040019";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// === PROSES TAMBAH KAMPANYE ===
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $target_dana = $_POST["target_dana"];
    $tanggal_mulai = $_POST["tanggal_mulai"];
    $tanggal_selesai = $_POST["tanggal_selesai"];
    $status = $_POST["status"];
    $dibuat_pada = date("Y-m-d H:i:s");
    $gambar = "";

    // Validasi tanggal
    if (strtotime($tanggal_mulai) > strtotime($tanggal_selesai)) {
        echo "<script>alert('Tanggal mulai tidak boleh setelah tanggal selesai.');</script>";
    } elseif ($target_dana < 1000000) {
        echo "<script>alert('Minimal target dana adalah Rp 1.000.000.');</script>";
    } else {
        // Upload gambar jika ada
        if (!empty($_FILES["gambar"]["name"])) {
            $upload_dir = "uploads/";
            $gambar_name = basename($_FILES["gambar"]["name"]);
            $target_path = $upload_dir . $gambar_name;
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_path)) {
                $gambar = $gambar_name;
            }
        }

        $sql = "INSERT INTO kampanye 
            (judul, deskripsi, target_dana, dana_terkumpul, tanggal_mulai, tanggal_selesai, status, gambar, dibuat_pada) 
            VALUES (?, ?, ?, 0, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssss", $judul, $deskripsi, $target_dana, $tanggal_mulai, $tanggal_selesai, $status, $gambar, $dibuat_pada);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Kampanye berhasil ditambahkan');</script>";
    }
}

$sql = "SELECT * FROM kampanye ORDER BY dibuat_pada DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kampanye Donasi</title>
    <style>
        body { font-family: sans-serif; background-color: #f2f2f2; }
        h2, h3 { text-align: center; }
        form, table { width: 90%; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; }
        label { display: block; margin-top: 10px; }
        input, textarea, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        table { border-collapse: collapse; margin-top: 40px; }
        th, td { border: 1px solid #4CAF50; padding: 10px; text-align: center; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>

<h3>Daftar Kampanye Donasi</h3>
<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Target Dana</th>
        <th>Dana Terkumpul</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Status</th>
        <th>Gambar</th>
        <th>Dibuat Pada</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php $no = 1; while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= ($row["judul"]) ?></td>
            <td><?= ($row["deskripsi"]) ?></td>
            <td>Rp<?= number_format($row["target_dana"], 0, ',', '.') ?></td>
            <td>Rp<?= number_format($row["dana_terkumpul"] ?? 0, 0, ',', '.') ?></td>
            <td><?= ($row["tanggal_mulai"]) ?></td>
            <td><?= ($row["tanggal_selesai"]) ?></td>
            <td><?= ($row["status"]) ?></td>
            <td>
                <?php if (!empty($row["gambar"])): ?>
                    <img src="uploads/<?= ($row["gambar"]) ?>" width="80">
                <?php else: ?>
                    Tidak ada gambar
                <?php endif; ?>
            </td>
            <td><?= ($row["dibuat_pada"]) ?></td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="10">Belum ada kampanye</td></tr>
    <?php endif; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>
