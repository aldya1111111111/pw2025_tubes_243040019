<?php
$conn = mysqli_connect("localhost", "root", "", "pw2025_tubes_243040019"); 

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM kampanye";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">


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
        <th>Aksi</th> 
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php $no = 1; while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row["judul"]) ?></td>
            <td><?= htmlspecialchars($row["deskripsi"]) ?></td>
            <td>Rp<?= number_format($row["target_dana"], 0, ',', '.') ?></td>
            <td>Rp<?= number_format($row["dana_terkumpul"] ?? 0, 0, ',', '.') ?></td>
            <td><?= $row["tanggal_mulai"] ?></td>
            <td><?= $row["tanggal_selesai"] ?></td>
            <td><?= $row["status"] ?></td>
            <td>
                <?php if (!empty($row["gambar"])): ?>
                    <img src="uploads/<?= htmlspecialchars($row["gambar"]) ?>" width="80">
                <?php else: ?>
                    Tidak ada gambar
                <?php endif; ?>
            </td>
            <td><?= $row["dibuat_pada"] ?></td>
            <td>
                <a href="editkampanye.php?id=<?= $row['id'] ?>" style="background:orange; padding:5px 10px; border-radius:5px; color:white; text-decoration:none;">✏️</a>
                |
                <a href="hapuskampanye.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus kampanye ini?');" style="background:red; padding:5px 10px; border-radius:5px; color:white; text-decoration:none;">🗑️</a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="11">Belum ada kampanye</td></tr>
    <?php endif; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>