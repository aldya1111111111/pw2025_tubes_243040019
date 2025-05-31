<?php
$conn = mysqli_connect("localhost", "root", "", "pw2025_tubes_243040019");

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];

  $query = "INSERT INTO pendonatur (nama, email, telepon) 
            VALUES ('$nama', '$email', '$telepon')";
  mysqli_query($conn, $query);
  header("Location: pendonatur.php");
  exit;
}

$pendonatur = mysqli_query($conn, "SELECT * FROM pendonatur ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Pendonatur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1 class="mb-4 text-center">Data Pendonatur</h1>

    <!-- Form Tambah Pendonatur -->
    <div class="card mb-4">
      <div class="card-header">Tambah Pendonatur</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" name="telepon" class="form-control" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>

    <!-- Tabel Pendonatur -->
    <div class="card">
      <div class="card-header">Daftar Pendonatur</div>
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Dibuat Pada</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($pendonatur)) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= $row['telepon'] ?></td>
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
