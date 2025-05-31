<?php
$conn = mysqli_connect("localhost", "root", "", "pw2025_tubes_243040019");
 include '.pendonasi.php';
if (isset($_POST['submit'])) {
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $target_dana = $_POST['target_dana'];
  $dana_terkumpul = $_POST['dana_terkumpul'];
  $tanggal_mulai = $_POST['tanggal_mulai'];
  $tanggal_selesai = $_POST['tanggal_selesai'];

  $query = "INSERT INTO kampanye (judul, deskripsi, target_dana, dana_terkumpul, tanggal_mulai, tanggal_selesai) 
            VALUES ('$judul', '$deskripsi', '$target_dana', '$dana_terkumpul', '$tanggal_mulai', '$tanggal_selesai')";
  mysqli_query($conn, $query);
  header("Location: kampanye.php");
  exit;
}

$kampanye = mysqli_query($conn, "SELECT * FROM kampanye ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Kampanye Donasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1 class="text-center mb-4">Daftar Kampanye Donasi</h1>

    <!-- Form Tambah Kampanye -->
    <div class="card mb-4">
      <div class="card-header">Tambah Kampanye</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Target Dana (Rp)</label>
              <input type="number" name="target_dana" step="0.01" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Dana Terkumpul (Rp)</label>
              <input type="number" name="dana_terkumpul" step="0.01" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Tanggal Mulai</label>
              <input type="date" name="tanggal_mulai" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Tanggal Selesai</label>
              <input type="date" name="tanggal_selesai" class="form-control" required>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-success">Simpan Kampanye</button>
        </form>
      </div>
    </div>

    <!-- Tabel Kampanye -->
    <div class="card">
      <div class="card-header">Daftar Kampanye</div>
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Target Dana</th>
              <th>Dana Terkumpul</th>
              <th>Periode</th>
              <th>Dibuat Pada</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($kampanye)) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
                <td>Rp<?= number_format($row['target_dana'], 2, ',', '.') ?></td>
                <td>Rp<?= number_format($row['dana_terkumpul'], 2, ',', '.') ?></td>
                <td><?= $row['tanggal_mulai'] ?> - <?= $row['tanggal_selesai'] ?></td>
                <td><?= $row['dibuat_pada'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
