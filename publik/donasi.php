<?php
$conn = mysqli_connect("localhost", "root", "", "pw2025_tubes_243040019");

// Ambil data pendonatur
$pendonatur = mysqli_query($conn, "SELECT * FROM pendonatur");

// Proses form
if (isset($_POST['submit'])) {
  $id_pendonatur = $_POST['id_pendonatur'];
  $jumlah = $_POST['jumlah'];
  $pesan = $_POST['pesan'];

  $query = "INSERT INTO donasi (id_pendonatur, jumlah, pesan) 
            VALUES ('$id_pendonatur', '$jumlah', '$pesan')";
  mysqli_query($conn, $query);
  header("Location: donasi.php");
  exit;
}

$donasi = mysqli_query($conn, "SELECT d.*, p.nama FROM donasi d 
                               JOIN pendonatur p ON d.id_pendonatur = p.id
                               ORDER BY d.tanggal_donasi DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Web Donasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h1 class="text-center mb-4">Form Donasi</h1>

  <!-- Form Donasi -->
  <div class="card mb-4">
    <div class="card-header">Donasi Sekarang</div>
    <div class="card-body">
      <form action="" method="post">
        <div class="mb-3">
          <label class="form-label">Pendonatur</label>
          <select name="id_pendonatur" class="form-select" required>
            <option value="" disabled selected>-- Pilih Pendonatur --</option>
            <?php while($p = mysqli_fetch_assoc($pendonatur)) : ?>
              <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nama']) ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Jumlah Donasi (Rp)</label>
          <input type="number" name="jumlah" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Pesan</label>
          <textarea name="pesan" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Kirim Donasi</button>
      </form>
    </div>
  </div>

  <!-- Tabel Donasi -->
  <div class="card">
    <div class="card-header">Riwayat Donasi</div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Nama Pendonatur</th>
            <th>Jumlah</th>
            <th>Pesan</th>
            <th>Tanggal Donasi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php while($d = mysqli_fetch_assoc($donasi)) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= htmlspecialchars($d['nama']) ?></td>
              <td>Rp<?= number_format($d['jumlah'], 2, ',', '.') ?></td>
              <td><?= nl2br(htmlspecialchars($d['pesan'])) ?></td>
              <td><?= $d['tanggal_donasi'] ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
